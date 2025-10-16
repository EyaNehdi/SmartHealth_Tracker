import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

document.addEventListener('DOMContentLoaded', () => {
    console.log('Group Chat JS loaded');

    const userIdMeta = document.querySelector('meta[name="user-id"]');
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (!userIdMeta || !csrfMeta) {
        console.error('Missing meta tags!');
        return;
    }

    const userId = userIdMeta.content;
    const csrfToken = csrfMeta.content;
    const messagesList = document.getElementById('messages');
    const messageInput = document.getElementById('message');
    const sendBtn = document.getElementById('sendBtn');
    const chatTitle = document.getElementById('chat-title');
    const bubbleContainer = document.querySelector('.inner-blog-post-wrap');

    if (!messagesList || !messageInput || !sendBtn || !chatTitle || !bubbleContainer) {
        console.error('Chat elements or bubble container not found');
        return;
    }

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: import.meta.env.VITE_PUSHER_APP_KEY,
        cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
        forceTLS: true,
        encrypted: true,
        auth: {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            withCredentials: true
        }
    });

    window.Echo.connector.pusher.connection.bind('connected', () => {
        console.log('Pusher connected successfully');
    });
    window.Echo.connector.pusher.connection.bind('error', (err) => {
        console.error('Pusher connection error:', err);
    });

    let currentChannel = null;
    let currentChallengeId = null;
    let isLoadingChat = false;

    window.loadChat = async (challengeId) => {
        if (isLoadingChat || currentChallengeId === challengeId) {
            console.log(`Chat load skipped: ${isLoadingChat ? 'Loading in progress' : 'Already on challenge.' + challengeId}`);
            return;
        }

        isLoadingChat = true;

        // Leave previous channel if exists
        if (currentChannel && currentChallengeId) {
            window.Echo.leaveChannel(`presence-challenge.${currentChallengeId}`);
            console.log(`Left channel presence-challenge.${currentChallengeId}`);
        }

        // Update current challenge
        currentChallengeId = challengeId;

        // Fetch messages
        try {
            const res = await fetch(`/challenges/${challengeId}/messages`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            if (!res.ok) throw new Error(`HTTP error: ${res.status}`);
            const data = await res.json();
            messagesList.innerHTML = ''; // Clear previous messages
            data.messages.forEach(msg => {
                const li = document.createElement('li');
                li.textContent = `${msg.sender.name}: ${msg.body}`;
                messagesList.appendChild(li);
            });
            chatTitle.textContent = `Chat for ${data.challenge.titre}`;
            messageInput.disabled = false;
            sendBtn.disabled = false;
        } catch (err) {
            console.error('Error loading chat:', err);
            chatTitle.textContent = 'Error loading chat';
        }

        // Join new channel
        currentChannel = window.Echo.join(`challenge.${challengeId}`)
            .listen('.App\\Events\\MessageSent', (e) => {
                console.log('Group event received (with namespace)', e);
                if (!e.sender || !e.sender.name || !e.body) {
                    console.error('Invalid event payload:', e);
                    return;
                }
                const li = document.createElement('li');
                li.textContent = `${e.sender.name}: ${e.body}`;
                messagesList.appendChild(li);
            })
            .here((users) => {
                console.log('Users in channel:', users);
            })
            .joining((user) => {
                console.log('User joined:', user);
                const li = document.createElement('li');
                li.textContent = `${user.name} has joined the chat`;
                messagesList.appendChild(li);
            })
            .leaving((user) => {
                console.log('User left:', user);
                const li = document.createElement('li');
                li.textContent = `${user.name} has left the chat`;
                messagesList.appendChild(li);
            })
            .subscribed(() => {
                console.log(`Subscribed to presence channel challenge.${challengeId}`);
                const li = document.createElement('li');
                li.textContent = 'You have joined the chat';
                messagesList.appendChild(li);
            })
            .error((err) => {
                console.error(`Error subscribing to challenge.${challengeId}:`, err);
            });

        isLoadingChat = false;
    };

    // Single event listener for bubble clicks using event delegation
    bubbleContainer.addEventListener('click', (e) => {
        const bubble = e.target.closest('.group-bubble');
        if (bubble) {
            const challengeId = bubble.dataset.challengeId;
            window.loadChat(challengeId);
        }
    });

    // Bind send button listener once
    sendBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        if (!currentChallengeId) {
            alert('Please select a group first!');
            return;
        }
        const body = messageInput.value.trim();
        if (!body) {
            alert('Please enter a message!');
            return;
        }

        try {
            console.log('Sending group message...', { body, challengeId: currentChallengeId });
            console.log('CSRF Token:', csrfToken);
            console.log('User ID:', userId);

            const res = await fetch(`/challenges/${currentChallengeId}/messages`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify({ body })
            });

            if (!res.ok) {
                const data = await res.json();
                console.error(`HTTP error: ${res.status} ${res.statusText}`, data);
                alert(data.message || 'Failed to send message');
                throw new Error(`HTTP error: ${res.status}`);
            }

            const data = await res.json();
            console.log('Group message sent', data);
            messageInput.value = '';
        } catch (err) {
            console.error('Error sending group message', err);
            alert('An error occurred while sending the message.');
        }
    });
});
