<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI Sports Coach</title>
    <style>
        #video-container {
            position: relative;
            width: 640px;
            height: 480px;
            margin-bottom: 20px; /* Space for buttons and instructions */
        }
        video, canvas {
            position: absolute;
            top: 0;
            left: 0;
            transform: scaleX(-1); /* Mirror the webcam for better UX */
        }
        #feedback {
            position: absolute;
            top: 430px; /* Adjusted to fit inside container */
            left: 10px;
            font-size: 20px;
            color: white;
            background: rgba(0,0,0,0.5);
            padding: 5px;
            border-radius: 5px;
            z-index: 10; /* Ensure on top */
            width: 600px; /* Wider for more text */
        }
        #instructions {
            margin-top: 20px;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 5px;
            max-width: 640px;
        }
        button {
            margin-right: 10px;
        }
        select {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video id="webcam" playsinline width="640" height="480"></video>
        <canvas id="output" width="640" height="480"></canvas>
        <div id="feedback">Loading... Click 'Start Camera' to begin.</div>
    </div>
    <select id="exerciseSelect">
        <option value="squat">Squat</option>
        <option value="deadlift">Deadlift</option>
    </select>
    <button id="startCamera">Start Camera</button>
    <button id="saveSession">Save Session</button>

    <div id="instructions">
        <h3>How to Do a Perfect Squat: Step-by-Step Guide</h3>
        <ol>
            <li>Stand with feet shoulder-width apart, toes pointed slightly outward (15-30 degrees).</li>
            <li>Engage your core, keep your chest up, and look straight ahead.</li>
            <li>Initiate the movement by pushing your hips back and bending your knees.</li>
            <li>Lower your body until your thighs are at least parallel to the ground (or deeper if mobility allows).</li>
            <li>Keep your knees tracking over your toes—don't let them cave inward.</li>
            <li>Maintain a neutral spine (back straight, no rounding or excessive arching).</li>
            <li>Drive through your heels to stand back up, squeezing your glutes at the top.</li>
            <li>Breathe: Inhale as you lower, exhale as you rise.</li>
        </ol>
        <h3>How to Do a Perfect Deadlift: Step-by-Step Guide</h3>
        <ol>
            <li>Stand with feet hip-width apart, bar over mid-foot (close to shins).</li>
            <li>Bend at hips and knees to grip bar (shoulder-width, mixed or overhand grip).</li>
            <li>Keep back flat/neutral, chest up, shoulders back, head neutral.</li>
            <li>Engage core, push through heels, extend hips and knees to lift bar.</li>
            <li>Keep bar close to body; at top, stand tall without hyperextending back.</li>
            <li>Lower by hinging at hips first, then bending knees once bar passes knees.</li>
            <li>Avoid common mistakes: Rounding back, yanking bar, letting knees cave, or leaning back at top.</li>
            <li>Breathe: Inhale before lift, exhale at top.</li>
        </ol>
        <p>Select an exercise, then perform it. The AI will provide real-time feedback. Aim for green lines for perfect form!</p>
    </div>

    <!-- TensorFlow.js -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.0.0/dist/tf.min.js"></script>
    <!-- PoseNet -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/posenet"></script>
    <!-- Local pose.js -->
    @vite(['resources/js/pose.js'])
</body>
</html>
