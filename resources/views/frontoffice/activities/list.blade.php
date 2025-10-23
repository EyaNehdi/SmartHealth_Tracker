@extends('shared.layouts.frontoffice')

@section('page-title', 'Activities List - SmartHealth Tracker')

@section('content')
    <!-- main-area -->
    <main class="main-area fix">
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Liste des activités</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Liste des activités</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__bg-shape">
                <span class="bottom-shape" data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- categories-area -->
        <section class="shop__area section-py-150">
            <div class="container">
                <!-- Affichage des messages flash -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('updated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updated') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="shop-item-wrap">
                            <!-- Grande carte blanche englobante -->
                            <div class="card p-4 shadow-sm bg-white">
                                <div class="row mb-3">
                              {{-- Dans votre vue actuelle --}}
<div class="col-12 d-flex justify-content-between align-items-center">
    <p class="mb-0">Affichage de {{ count($activities) }} activité(s)</p>
    
    <!-- Bouton amélioré pour les recommandations -->
    @auth
        @if(Auth::user()->preferences->count() > 0)
            <a href="{{ route('activities.recommended') }}" class="btn btn-warning btn-sm">
                🌟 Activités Recommandées 
            </a>
        @else
            <a href="{{ route('preferences.create') }}" class="btn btn-outline-warning btn-sm">
                ⚙️ Définir mes préférences
            </a>
        @endif
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-warning btn-sm">
            🔐 Se connecter pour les recommandations
        </a>
    @endauth

    <a href="{{ route('activities.statistics') }}" class="btn btn-primary btn-sm">
        📊 Voir Statistiques
    </a>

     <a href="/sport-session" class="btn btn-secondary btn-sm">
        🤖 Commencer Activité
    </a>
</div>
                                </div>

                                <div class="row g-4">
                                    @forelse ($activities as $activity)
                                        <!-- Vérification pour le blocage -->
                                        @php
                                            $isPaidActivity = $activity->prix && $activity->prix > 0;
                                            $userId = Auth::check() ? Auth::id() : null;
                                            $hasPaid = $userId ? $activity->hasPaid($userId) : false;
                                            $isBlocked = $isPaidActivity && !$hasPaid;
                                            $isFreeOrPaid = !$isPaidActivity || $hasPaid;
                                        @endphp

                                        <!-- Carte carrée individuelle -->
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            @if ($isFreeOrPaid)
                                                <!-- Lien normal vers détail si gratuit ou payé -->
                                                <a href="{{ route('activities.detail', $activity->id) }}" class="text-decoration-none">
                                            @else
                                                <!-- Lien vers paiement si bloqué (activité payante non payée) -->
                                                <a href="{{ route('activities.checkout', $activity->id) }}" class="text-decoration-none">
                                            @endif
                                            <div class="position-relative">
                                                <!-- Badge indiquant le statut -->
                                                @if ($isPaidActivity)
                                                    <span class="position-absolute top-0 start-0 badge bg-warning text-dark ms-2 mt-2 z-20">
                                                        {{ $hasPaid ? 'Accès Débloqué' : 'Payant - Réservez' }}
                                                    </span>
                                                @else
                                                    <span class="position-absolute top-0 start-0 badge bg-success ms-2 mt-2 z-20">
                                                        Gratuit
                                                    </span>
                                                @endif

                                                <div class="card h-100 text-center border rounded">
                                                    @php
                                                        $imageUrl = $activity->image ? Storage::url($activity->image) : Vite::asset('resources/assets/img/slider/aaa.jpg');
                                                    @endphp
                                                    <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $activity->nom }}" style="height: 180px; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $activity->nom }}</h5>
                                                        <p class="card-text"><i class="fas fa-calendar-alt"></i>  <strong>Date début :</strong> {{ $activity->date_debut ? $activity->date_debut->format('d/m/Y') : 'Non défini' }}</p>
                                                        <p class="card-text"><i class="fas fa-calendar-alt"></i>  <strong>Date fin :</strong> {{ $activity->date_fin ? $activity->date_fin->format('d/m/Y') : 'Non défini' }}</p>
                                                        @if ($activity->equipments->isNotEmpty())
                                                            <ul class="list-unstyled small text-start">
                                                                @foreach ($activity->equipments as $equipment)
                                                                    <li><strong> 🏋️ Équipement :</strong> {{ $equipment->nom }} ({{ $equipment->type }})</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p> 🏋️ : Aucun équipement</p>
                                                        @endif
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                                        @if ($activity->prix)
                                                            <p class="card-text">💰<strong>Prix :</strong> {{ number_format($activity->prix) }} €</p>
                                                            @if ($hasPaid)
                                                                <!-- Indicateur pour activité payée -->
                                                                <p class="card-text text-success fw-bold">Payé ✅</p>
                                                            @else
                                                                <!-- Bouton Réserver pour activité payante non payée -->
                                                                <a href="{{ route('activities.checkout', $activity->id) }}" class="btn btn-success btn-sm rounded-pill px-3 py-2 shadow reserve-btn">
                                                                    <i class="fas fa-shopping-cart me-1"></i> Participer
                                                                </a>
                                                            @endif
                                                        @else
                                                            <p class="card-text text-success fw-bold">Gratuit !</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p>Aucune activité trouvée.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar avec formulaires de recherche et filtres indépendants -->
                    <div class="col-30">
                        <aside class="shop__sidebar">
                            <div class="sidebar-widget">
                                <h4 class="sidebar-title">
                                    <!-- Icône de réinitialisation -->
                                    <a href="{{ route('activities.front') }}" title="Réinitialiser les filtres" style="margin-right: 5px;">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 3V1.5L6.75 3.75L9 6V4.5C11.4825 4.5 13.5 6.5175 13.5 9C13.5 9.795 13.2975 10.545 12.945 11.1975L14.115 12.3675C14.73 11.43 15.09 10.2975 15.09 9C15.09 5.6925 12.3075 3 9 3ZM9 13.5C6.5175 13.5 4.5 11.4825 4.5 9C4.5 8.205 4.7025 7.455 5.055 6.8025L3.885 5.6325C3.27 6.57 2.91 7.7025 2.91 9C2.91 12.3075 5.6925 15 9 15V16.5L11.25 14.25L9 12V13.5Z" fill="#22c55e"/>
                                        </svg>
                                    </a>
                                    Rechercher et Filtrer
                                </h4>
                                <!-- Formulaire de recherche par mot-clé -->
                                <form action="{{ route('activities.front') }}" method="GET" class="mb-4">
                                    <div class="form-grp">
                                        <label for="search">Rechercher</label>
                                        <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Mot-clé (nom ou description)">
                                    </div>
                                    <button type="submit" class="tg-btn tg-btn-three black-btn mt-2">Rechercher</button>
                                </form>

                                <!-- Formulaire de filtrage par date -->
                                <form action="{{ route('activities.front') }}" method="GET">
                                    <div class="form-grp">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
                                    </div>
                                    <button type="submit" class="tg-btn tg-btn-three black-btn mt-2">Filtrer par date</button>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>

                <!-- Icône flottante de chat -->
                <div id="chat-icon" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000; cursor: pointer;">
                    <button class="btn btn-success rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: #22c55e;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z"/>
                            <path d="M9 11h6v2H9z"/>
                        </svg>
                    </button>
                </div>

                <!-- Modale de chat -->
                <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #22c55e; color: white;">
                                <h5 class="modal-title" id="chatModalLabel">Assistant Fitness (DeepSeek)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: white;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="chat-container" class="border rounded p-3 mb-3" style="height: 400px; overflow-y: auto; background-color: #f8f9fa;">
                                    <div id="messages">
                                        <div class="text-center text-muted mb-3">
                                            <small>Posez une question à l’assistant IA ! Ex. : "Quels exercices pour débutants en cardio ?"</small>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::check())
                                    <div class="input-group">
                                        <input type="text" id="message-input" class="form-control" placeholder="Votre question...">
                                        <button id="send-button" class="btn btn-success">Envoyer</button>
                                    </div>
                                @else
                                    <div class="alert alert-warning text-center">Connectez-vous pour utiliser le chat IA.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- categories-area-end -->
        </main>
        <!-- main-area-end -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Script chargé');
            const chatIcon = document.getElementById('chat-icon');
            const chatModal = new bootstrap.Modal(document.getElementById('chatModal'));
            const messageInput = document.getElementById('message-input');
            const sendButton = document.getElementById('send-button');
            const messages = document.getElementById('messages');

            if (chatIcon && chatModal && messageInput && sendButton && messages) {
                console.log('Éléments trouvés');
                chatIcon.addEventListener('click', () => {
                    console.log('Clic sur icône');
                    chatModal.show();
                    messageInput.focus();
                });

                function addMessage(content, isUser = true) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `mb-2 ${isUser ? 'text-end' : 'text-start'}`;
                    messageDiv.innerHTML = `<div class="d-inline-block p-2 rounded ${isUser ? 'bg-success text-white' : 'bg-light text-dark'}">${content}</div>`;
                    messages.appendChild(messageDiv);
                    messages.scrollTop = messages.scrollHeight;
                }

                function sendMessage() {
                    const message = messageInput.value.trim();
                    if (!message) return;

                    addMessage(message, true);
                    messageInput.value = '';
                    sendButton.disabled = true;
                    sendButton.innerHTML = 'Envoi...';

                    fetch('{{ route("chat.send") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message: message })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            addMessage(data.response, false);
                        } else {
                            addMessage('Erreur : ' + (data.error || 'Réponse IA non disponible'), false);
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        addMessage('Erreur de connexion. Réessayez.', false);
                    })
                    .finally(() => {
                        sendButton.disabled = false;
                        sendButton.innerHTML = 'Envoyer';
                    });
                }

                sendButton.addEventListener('click', sendMessage);
                messageInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') sendMessage();
                });

                document.getElementById('chatModal').addEventListener('hidden.bs.modal', () => {
                    messages.innerHTML = '<div class="text-center text-muted mb-3"><small>Posez une question à l’assistant IA ! Ex. : "Quels exercices pour débutants en cardio ?"</small></div>';
                    messageInput.value = '';
                });
            } else {
                console.error('Éléments manquants:', { chatIcon, chatModal, messageInput, sendButton, messages });
            }

            // Script existant pour les likes
            console.log('=== SCRIPT LIKE CHARGÉ ===');
            const likeButtons = document.querySelectorAll('.like-button');
            console.log('Boutons like trouvés : ' + likeButtons.length);
            if (likeButtons.length === 0) {
                console.warn('Aucun bouton like trouvé, normal pour activités payantes non payées.');
            }

            likeButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('=== CLIC SUR CŒUR DÉTECTÉ ! ===');

                    const activityId = this.getAttribute('data-activity-id');
                    const isLiked = this.getAttribute('data-liked') === 'true';
                    const heartIcon = this.querySelector('.heart-icon');
                    const likeCountElement = this.parentElement.querySelector('.like-count');

                    if (!activityId) {
                        console.error('Pas d\'ID activité !');
                        return;
                    }

                    console.log('ID : ' + activityId + ', Liké avant : ' + isLiked);

                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
                    if (!csrfToken) {
                        console.error('Pas de token CSRF !');
                        return;
                    }

                    fetch('/activities/' + activityId + '/like', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => {
                        console.log('Réponse : Statut ' + response.status);
                        if (!response.ok) {
                            throw new Error('Erreur HTTP ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('JSON reçu : ', data);
                        if (data.success) {
                            heartIcon.classList.toggle('text-danger', data.isLiked);
                            if (likeCountElement) {
                                likeCountElement.textContent = data.likes;
                            }
                            this.setAttribute('data-liked', data.isLiked.toString());
                            console.log('SUCCÈS ! Nouveaux likes : ' + data.likes);
                        } else {
                            console.error('Échec : ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('ERREUR FETCH : ', error);
                    });
                });
            });
        });
    </script>
@endsection