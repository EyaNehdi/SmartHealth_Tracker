import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

document.addEventListener('DOMContentLoaded', () => {
    console.log('Chat JS loaded');

    const userIdMeta = document.querySelector('meta[name="user-id"]');
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');

    if (!userIdMeta || !csrfMeta) {
        console.error("Missing user-id or csrf-token meta tag!");
        return;
    }

    const userId = userIdMeta.content;
    const csrfToken = csrfMeta.content;

    const messagesList = document.getElementById('messages');
    const sendBtn = document.getElementById('sendBtn');
    const messageInput = document.getElementById('message');

    // Echo / Pusher config
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: import.meta.env.VITE_PUSHER_APP_KEY,
        cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
        forceTLS: true,
        encrypted: true,
        auth: {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            withCredentials: true,
        },
    });

    // Listen for private messages
    window.Echo.private(`user.${userId}`)
        .listen('MessageSent', (e) => {
            console.log('Event received:', e);
            const li = document.createElement('li');
            li.textContent = `${e.sender.name}: ${e.body}`;
            messagesList.appendChild(li);
        });

    // Send message
    sendBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        const body = messageInput.value.trim();
        if (!body) return alert("Écris un message !");

        try {
            console.log('Sending message...', { to_user_id: 2, body });
            console.log('CSRF Token:', csrfToken);
            console.log('User ID:', userId);

            const res = await fetch('/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                credentials: 'same-origin',
                body: JSON.stringify({ to_user_id: 2, body }),
            });

            if (!res.ok) {
                const text = await res.text();
                console.error(`HTTP error: ${res.status} ${res.statusText}`);
                console.error('Response body:', text.substring(0, 500));
                throw new Error(`HTTP error: ${res.status}`);
            }

            const data = await res.json();
            console.log('Message sent:', data);
            messageInput.value = '';
        } catch (err) {
            console.error('Error sending message:', err);
        }
    });
});
