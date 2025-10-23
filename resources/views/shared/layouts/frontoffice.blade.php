<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'SmartHealth Tracker')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/magnific-popup.css'])
    @vite(['resources/assets/css/swiper-bundle.min.css'])
    @vite(['resources/assets/css/slick.css'])
    @vite(['resources/assets/css/default-icons.css'])
    @vite(['resources/assets/css/default.css'])
    @vite(['resources/assets/css/sal.css'])
    @vite(['resources/assets/css/tg-cursor.css'])
    @vite(['resources/assets/css/main.css'])

    <!-- Custom CSS for footer text visibility -->
    <style>
        /* Fix footer text visibility */
        .footer {
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .footer__widget p {
            color: #cccccc !important;
        }

        .footer__widget h4,
        .footer__widget h5,
        .footer__widget h6 {
            color: #ffffff !important;
        }

        .footer__widget a {
            color: #cccccc !important;
        }

        .footer__widget a:hover {
            color: #ffffff !important;
        }

        .footer__social a {
            color: #cccccc !important;
        }

        .footer__social a:hover {
            color: #ffffff !important;
        }

        .footer__copyright {
            color: #cccccc !important;
        }

        .footer__copyright a {
            color: #cccccc !important;
        }

        .footer__copyright a:hover {
            color: #ffffff !important;
        }

        /* Chat Widget Styles */
        .chat-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .chat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .chat-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .chat-box {
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header h6 {
            margin: 0;
            flex: 1;
        }

        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background: #f8f9fa;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px 15px;
            border-radius: 18px;
            max-width: 80%;
            word-wrap: break-word;
        }

        .user-message {
            background: #667eea;
            color: white;
            margin-left: auto;
            border-bottom-right-radius: 5px;
        }

        .bot-message {
            background: white;
            color: #333;
            border: 1px solid #e9ecef;
            margin-right: auto;
            border-bottom-left-radius: 5px;
        }

        .chat-input {
            display: flex;
            padding: 15px;
            background: white;
            border-top: 1px solid #e9ecef;
        }

        .chat-input input {
            flex: 1;
            border: 1px solid #e9ecef;
            border-radius: 25px;
            padding: 10px 15px;
            margin-right: 10px;
            outline: none;
        }

        .chat-input input:focus {
            border-color: #667eea;
        }

        .chat-input button {
            width: 40px;
            height: 40px;
            border: none;
            background: #667eea;
            color: white;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .chat-input button:hover {
            background: #5a6fd8;
        }

        .chat-input button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .btn-close {
            background: transparent;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            padding: 0;
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body class="font-sans antialiased">
<!-- Preloader -->
<div id="preloader">
    <div id="loader" class="loader">
        <div class="loader-container">
            <div class="loader-icon">
                <img src="{{ Vite::asset('resources/assets/img/logo/preloader.svg') }}" alt="Preloader">
            </div>
        </div>
    </div>
</div>
<!-- Preloader-end -->

<!-- Scroll-top -->

<!-- Scroll-top-end -->

<!-- Header -->
@include('shared.partials.frontoffice-header')

<!-- Main Content -->
<main class="main-area fix">
    @yield('content')
</main>

<!-- Footer -->
@include('shared.partials.frontoffice-footer')

<!-- Chat Widget -->
<div class="chat-widget">
    <div class="chat-icon" id="chatIcon">
        <i class="fas fa-comment-dots"></i>
    </div>
    <div class="chat-box" id="chatBox" style="display: none;">
        <div class="chat-header">
            <h6>Assistant  Energix</h6>
            <button class="btn-close" id="closeChat">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-messages" id="chatMessages">
            <div class="message bot-message">
                <p>Bonjour ! Je suis votre assistant Energix. Comment puis-je vous aider aujourd'hui ?</p>
            </div>
        </div>
        <div class="chat-input">
            <input type="text" id="messageInput" placeholder="Tapez votre message..." maxlength="1000">
            <button id="sendMessage">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

@vite(['resources/assets/js/vendor/jquery-3.6.0.min.js'])
@vite(['resources/assets/js/bootstrap.min.js'])
@vite(['resources/assets/js/jquery.magnific-popup.min.js'])
@vite(['resources/assets/js/jquery.appear.js'])
@vite(['resources/assets/js/swiper-bundle.min.js'])
@vite(['resources/assets/js/slick.js'])
@vite(['resources/assets/js/jquery.marquee.min.js'])
@vite(['resources/assets/js/jquery.counterup.min.js'])
@vite(['resources/assets/js/tg-cursor.min.js'])
@vite(['resources/assets/js/jquery.easing.js'])
@vite(['resources/assets/js/sal.js'])
@vite(['resources/assets/js/ajax-form.js'])
@vite(['resources/assets/js/main.js'])
@vite(['resources/js/group_chat.js'])
@vite(['resources/js/pose.js'])
    <!-- Local pose.js -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatIcon = document.getElementById('chatIcon');
    const chatBox = document.getElementById('chatBox');
    const closeChat = document.getElementById('closeChat');
    const messageInput = document.getElementById('messageInput');
    const sendMessage = document.getElementById('sendMessage');
    const chatMessages = document.getElementById('chatMessages');

    // Ouvrir/fermer le chat
    chatIcon.addEventListener('click', function() {
        chatBox.style.display = chatBox.style.display === 'none' ? 'flex' : 'none';
    });

    closeChat.addEventListener('click', function() {
        chatBox.style.display = 'none';
    });

    // Envoyer un message avec Enter
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage.click();
        }
    });

    // Envoyer un message avec le bouton
    sendMessage.addEventListener('click', function() {
        const message = messageInput.value.trim();
        if (message === '') return;

        // Ajouter le message de l'utilisateur
        addMessage(message, 'user');
        messageInput.value = '';

        // Désactiver le bouton pendant l'envoi
        sendMessage.disabled = true;
        sendMessage.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        // Envoyer au backend
        fetch('{{ route("chat.send") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                addMessage(data.response, 'bot');
            } else {
                addMessage('Désolé, une erreur est survenue. Veuillez réessayer.', 'bot');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            addMessage('Désolé, une erreur de connexion est survenue.', 'bot');
        })
        .finally(() => {
            sendMessage.disabled = false;
            sendMessage.innerHTML = '<i class="fas fa-paper-plane"></i>';
        });
    });

    function addMessage(content, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}-message`;

        const messageP = document.createElement('p');
        messageP.textContent = content;
        messageP.style.margin = '0';
        messageP.style.fontSize = '14px';
        messageP.style.lineHeight = '1.4';

        messageDiv.appendChild(messageP);
        chatMessages.appendChild(messageDiv);

        // Scroll vers le bas
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
</script>
@stack('frontoffice-scripts')
</body>
</html>
