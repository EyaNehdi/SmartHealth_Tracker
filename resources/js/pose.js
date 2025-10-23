document.addEventListener('DOMContentLoaded', () => {
    console.log('pose.js loaded successfully');

    const video = document.getElementById('webcam');
    const canvas = document.getElementById('output');
    const ctx = canvas.getContext('2d');
    const feedback = document.getElementById('feedback');
    const saveButton = document.getElementById('saveSession');
    const startButton = document.getElementById('startCamera');
    const exerciseSelect = document.getElementById('exerciseSelect');

    console.log('Button elements:', startButton, saveButton);

    // Array to store session data (keypoints over time)
    let sessionData = [];
    let isRecording = false;
    let net; // To store loaded PoseNet
    let currentExercise = exerciseSelect.value; // Default to squat

    // Update exercise on change
    exerciseSelect.addEventListener('change', () => {
        currentExercise = exerciseSelect.value;
        feedback.innerText = `Switched to ${currentExercise}. Perform for feedback.`;
    });

    // CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    console.log('CSRF Token:', csrfToken);

    // Skeleton connections (pairs of parts to connect with lines)
    const skeleton = [
        ['leftShoulder', 'rightShoulder'],
        ['leftShoulder', 'leftElbow'],
        ['leftElbow', 'leftWrist'],
        ['rightShoulder', 'rightElbow'],
        ['rightElbow', 'rightWrist'],
        ['leftShoulder', 'leftHip'],
        ['rightShoulder', 'rightHip'],
        ['leftHip', 'rightHip'],
        ['leftHip', 'leftKnee'],
        ['leftKnee', 'leftAnkle'],
        ['rightHip', 'rightKnee'],
        ['rightKnee', 'rightAnkle']
    ];

    async function setupCamera() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
            await new Promise((resolve) => {
                video.onloadedmetadata = () => {
                    video.play();
                    resolve(video);
                };
            });
            feedback.innerText = "Camera ready. Loading AI model...";
        } catch (err) {
            console.error('Camera error:', err);
            feedback.innerText = "Error accessing camera. Check permissions.";
        }
    }

    async function loadPosenet() {
        try {
            net = await posenet.load({
                architecture: 'MobileNetV1',
                outputStride: 16,
                inputResolution: { width: 640, height: 480 },
                multiplier: 0.75
            });
            feedback.innerText = `AI model loaded. Detecting poses... Perform ${currentExercise}s for feedback.`;
            return net;
        } catch (err) {
            console.error('PoseNet load error:', err);
            feedback.innerText = "Error loading AI model.";
        }
    }

    function getKeypoint(keypoints, part) {
        const kp = keypoints.find(k => k.part === part);
        return kp && kp.score > 0.5 ? kp.position : null;
    }

    // Draw keypoints (red dots)
    function drawKeypoints(keypoints) {
        keypoints.forEach(point => {
            if (point.score > 0.5) {
                ctx.beginPath();
                ctx.arc(point.position.x, point.position.y, 5, 0, 2 * Math.PI);
                ctx.fillStyle = "red";
                ctx.fill();
            }
        });
    }

    // Draw skeleton lines with color (green good, red bad)
    function drawSkeleton(keypoints, color) {
        skeleton.forEach(([partA, partB]) => {
            const a = getKeypoint(keypoints, partA);
            const b = getKeypoint(keypoints, partB);
            if (a && b) {
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.strokeStyle = color;
                ctx.lineWidth = 2;
                ctx.stroke();
            }
        });
    }

    // Simple angle calculation between three points (A-B-C)
    function calculateAngle(A, B, C) {
        if (!A || !B || !C) return null;
        const AB = Math.sqrt(Math.pow(B.x - A.x, 2) + Math.pow(B.y - A.y, 2));
        const BC = Math.sqrt(Math.pow(B.x - C.x, 2) + Math.pow(B.y - C.y, 2));
        const AC = Math.sqrt(Math.pow(C.x - A.x, 2) + Math.pow(C.y - A.y, 2));
        return Math.acos((AB * AB + BC * BC - AC * AC) / (2 * AB * BC)) * (180 / Math.PI);
    }

    // Torso angle relative to horizontal (for lean detection)
    function calculateTorsoAngle(shoulder, hip) {
        if (!shoulder || !hip) return null;
        const deltaY = hip.y - shoulder.y; // Inverted if needed based on coord system
        const deltaX = hip.x - shoulder.x;
        return Math.atan2(deltaY, deltaX) * (180 / Math.PI);
    }

    // Analyze pose based on selected exercise
    function analyzePose(keypoints) {
        const leftShoulder = getKeypoint(keypoints, 'leftShoulder');
        const rightShoulder = getKeypoint(keypoints, 'rightShoulder');
        const leftHip = getKeypoint(keypoints, 'leftHip');
        const rightHip = getKeypoint(keypoints, 'rightHip');
        const leftKnee = getKeypoint(keypoints, 'leftKnee');
        const rightKnee = getKeypoint(keypoints, 'rightKnee');
        const leftAnkle = getKeypoint(keypoints, 'leftAnkle');
        const rightAnkle = getKeypoint(keypoints, 'rightAnkle');

        let corrections = [];
        let isGoodForm = true;

        if (!leftHip || !rightHip || !leftKnee || !rightKnee || !leftAnkle || !rightAnkle) {
            return { corrections: 'Stand in full view for better detection.', isGoodForm: false };
        }

        if (currentExercise === 'squat') {
            // Squat analysis (from previous)
            const leftKneeAngle = calculateAngle(leftHip, leftKnee, leftAnkle);
            const rightKneeAngle = calculateAngle(rightHip, rightKnee, rightAnkle);
            const avgKneeAngle = (leftKneeAngle + rightKneeAngle) / 2;

            if (avgKneeAngle > 110) {
                corrections.push('Lower deeper - push hips back and bend knees more.');
                isGoodForm = false;
            } else if (avgKneeAngle < 80) {
                corrections.push('Don\'t go too deep if it compromises form; aim for thighs parallel to ground.');
                isGoodForm = false;
            }

            const leftBackAngle = calculateAngle(leftShoulder, leftHip, leftAnkle);
            const rightBackAngle = calculateAngle(rightShoulder, rightHip, rightAnkle);
            const avgBackAngle = (leftBackAngle + rightBackAngle) / 2;

            if (avgBackAngle < 135 || avgBackAngle > 165) {
                corrections.push('Keep back neutral - chest up, no rounding or excessive lean.');
                isGoodForm = false;
            }

            const leftKneeOverToe = Math.abs(leftKnee.x - leftAnkle.x) < 50;
            const rightKneeOverToe = Math.abs(rightKnee.x - rightAnkle.x) < 50;
            if (!leftKneeOverToe || !rightKneeOverToe) {
                corrections.push('Knees caving in/out - track them over your toes.');
                isGoodForm = false;
            }

            const avgHipY = (leftHip.y + rightHip.y) / 2;
            const avgKneeY = (leftKnee.y + rightKnee.y) / 2;
            if (avgKneeAngle < 110 && avgHipY < avgKneeY) {
                corrections.push('Lower hips more - break parallel for full squat.');
                isGoodForm = false;
            }

            if (Math.abs(leftKneeAngle - rightKneeAngle) > 15 || Math.abs(leftBackAngle - rightBackAngle) > 15) {
                corrections.push('Form asymmetry - balance weight evenly.');
                isGoodForm = false;
            }

            if (leftShoulder && rightShoulder) {
                const avgShoulderY = (leftShoulder.y + rightShoulder.y) / 2;
                if (avgShoulderY > avgHipY + 50) {
                    corrections.push('Keep chest up - avoid rounding shoulders.');
                    isGoodForm = false;
                }
            }
        } else if (currentExercise === 'deadlift') {
            // Deadlift analysis
            // Back neutrality: Shoulder-hip-knee angle close to 180 (flat back)
            const leftBackAngle = calculateAngle(leftShoulder, leftHip, leftKnee);
            const rightBackAngle = calculateAngle(rightShoulder, rightHip, rightKnee);
            const avgBackAngle = (leftBackAngle + rightBackAngle) / 2;

            if (Math.abs(avgBackAngle - 180) > 20) {
                corrections.push('Keep back flat/neutral - no rounding; chest up.');
                isGoodForm = false;
            }

            // Knee angle: Slightly bent (150-170 degrees at start)
            const leftKneeAngle = calculateAngle(leftHip, leftKnee, leftAnkle);
            const rightKneeAngle = calculateAngle(rightHip, rightKnee, rightAnkle);
            const avgKneeAngle = (leftKneeAngle + rightKneeAngle) / 2;

            if (avgKneeAngle < 150) {
                corrections.push('Don\'t bend knees too much - hips higher, like a hinge.');
                isGoodForm = false;
            } else if (avgKneeAngle > 170) {
                corrections.push('Bend knees slightly more - engage legs, not just back.');
                isGoodForm = false;
            }

            // Torso lean: ~30-45 degrees to horizontal at start (but dynamic during lift)
            const leftTorsoAngle = calculateTorsoAngle(leftShoulder, leftHip);
            const rightTorsoAngle = calculateTorsoAngle(rightShoulder, rightHip);
            const avgTorsoAngle = Math.abs((leftTorsoAngle + rightTorsoAngle) / 2); // Absolute for lean

            if (avgKneeAngle > 150 && (avgTorsoAngle < 30 || avgTorsoAngle > 60)) { // Check at bottom position
                corrections.push('Adjust torso lean - hinge at hips for 30-45 degree angle.');
                isGoodForm = false;
            }

            // Hip height vs knees: Hips should be higher than knees at start
            const avgHipY = (leftHip.y + rightHip.y) / 2;
            const avgKneeY = (leftKnee.y + rightKnee.y) / 2;
            if (avgHipY >= avgKneeY) {
                corrections.push('Raise hips higher - should be above knees for proper start.');
                isGoodForm = false;
            }

            // Knees not caving
            const leftKneeOverToe = Math.abs(leftKnee.x - leftAnkle.x) < 50;
            const rightKneeOverToe = Math.abs(rightKnee.x - rightAnkle.x) < 50;
            if (!leftKneeOverToe || !rightKneeOverToe) {
                corrections.push('Knees caving in/out - keep them tracking over toes.');
                isGoodForm = false;
            }

            // No hyperextension at top: Back angle close to 180 at standing
            if (avgKneeAngle < 170 && Math.abs(avgBackAngle - 180) > 10) { // At top
                corrections.push('Don\'t lean back at top - stand tall, neutral spine.');
                isGoodForm = false;
            }

            // Symmetry
            if (Math.abs(leftKneeAngle - rightKneeAngle) > 15 || Math.abs(leftBackAngle - rightBackAngle) > 15) {
                corrections.push('Form asymmetry - balance weight evenly.');
                isGoodForm = false;
            }
        }

        return { corrections: corrections.join(' | '), isGoodForm };
    }

    async function detectPose() {
        if (!net || !video.videoWidth) return;

        try {
            const pose = await net.estimateSinglePose(video, { flipHorizontal: true });
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            drawKeypoints(pose.keypoints);

            const { corrections, isGoodForm } = analyzePose(pose.keypoints);
            const lineColor = isGoodForm ? 'green' : 'red';
            drawSkeleton(pose.keypoints, lineColor);

            feedback.innerText = isGoodForm ? `Perfect ${currentExercise} form! Keep it up.` : corrections;

            if (isRecording) {
                sessionData.push({
                    timestamp: Date.now(),
                    keypoints: pose.keypoints.map(k => ({ part: k.part, position: k.position, score: k.score })),
                    exercise: currentExercise
                });
            }
        } catch (err) {
            console.error('Detect pose error:', err);
        }
    }

    // Start button handler
    startButton.addEventListener('click', async () => {
        console.log('Start Camera button clicked');
        startButton.disabled = true;
        await setupCamera();
        await loadPosenet();
        isRecording = true;
        setInterval(detectPose, 100); // Real-time detection ~10 FPS
        console.log('Camera and detection started');
    });
    console.log('Start button listener attached');

    // Save session handler
    // Save session handler
saveButton.addEventListener('click', async () => {
    console.log('Save Session button clicked');
    if (!sessionData.length) {
        console.log('No data to save');
        return alert('No session data to save! Start camera and move first.');
    }

    try {
        console.log('Sending session data:', sessionData);
        const res = await fetch('/sport-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            credentials: 'same-origin', // Add this to send session cookies for auth
            body: JSON.stringify({ session_data: JSON.stringify(sessionData) })
        });

        if (res.ok) {
            const data = await res.json();
            console.log('Session saved:', data);
            sessionData = []; // Reset
            alert('Session saved successfully!');
        } else {
            console.error('Save failed:', res.status, await res.text());
        }
    } catch (err) {
        console.error('Error saving session:', err);
    }
});
console.log('Save button listener attached');
});
