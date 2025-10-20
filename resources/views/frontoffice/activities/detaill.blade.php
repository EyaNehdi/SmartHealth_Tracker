{{-- 6. Vue mise à jour : resources/views/frontoffice/activities/detail.blade.php --}}
@extends('shared.layouts.frontoffice')

@section('page-title', 'Détails de l\'Activité - SmartHealth Tracker')

@push('styles')
    <style>
        .star-rating {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .star {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
            margin: 0 5px;
        }
        .star.selected,
        .star:hover,
        .star.selected ~ .star:hover {
            color: #ffd700;
        }
        .star.selected ~ .star {
            color: #ddd;
        }
        .comment-form .form-grp {
            margin-bottom: 15px;
        }
        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            min-height: 100px;
        }
        .comment-form button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .comment-form button:hover {
            background-color: #0056b3;
        }
        .existing-comment {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        .existing-comment:last-child {
            border-bottom: none;
        }
        .comment-user {
            font-weight: bold;
            color: #007bff;
        }
        .comment-date {
            color: #666;
            font-size: 0.9em;
        }
        .comment-text {
            margin: 10px 0;
        }
        .comment-stars {
            color: #ffd700;
            margin-bottom: 5px;
        }
        .alert {
            margin-bottom: 20px;
        }

        /* NOUVEAUX STYLES AJOUTÉS */
        /* Système d'étoiles interactif */
        .star-rating-interactive {
            display: flex;
            gap: 8px;
            margin: 10px 0;
        }

        .star-interactive {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }

        .star-interactive:hover {
            transform: scale(1.2);
        }

        .star-interactive.active {
            color: #ffd700;
        }

        /* Animation de secousse */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-3px); }
            75% { transform: translateX(3px); }
        }

        .rating-text {
            font-size: 0.9em;
            font-style: italic;
            min-height: 20px;
        }

        /* Alerte globale en haut de page */
        .global-alert-container {
            position: fixed;
            top: 80px;
            left: 0;
            right: 0;
            z-index: 9999;
            display: flex;
            justify-content: center;
            padding: 0 20px;
        }

        .alert-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            animation: slideInFromTop 0.5s ease;
            max-width: 600px;
            width: 100%;
        }

        .alert-custom.success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border: 2px solid #28a745;
        }

        .alert-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-grow: 1;
            font-weight: 500;
        }

        .alert-close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font-size: 1.1em;
            padding: 5px;
            margin-left: 15px;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .alert-close:hover {
            opacity: 1;
        }

        @keyframes slideInFromTop {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .global-alert-container {
                top: 60px;
                padding: 0 15px;
            }
            
            .alert-custom {
                padding: 12px 20px;
            }
            
            .alert-content {
                font-size: 0.9em;
            }
        }
    </style>
@endpush

@section('content')
    <!-- main-area -->
    <main class="main-area fix">

        <!-- MESSAGE D'ALERTE EN HAUT DE PAGE -->
       

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Détails de l'Activité</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('activities.front') }}">Liste des Activités</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">{{ $activity->nom ?? 'Activité' }}</span>
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

        <!-- blog-details-area -->
        <section class="blog__details-area section-py-150">
            <div class="container">
                <div class="row">
                    <div class="col-70">
                        <div class="blog__details-wrap">
                            <div class="blog__post-thumb-four blog__details-thumb">
                                @php
                                    $imageUrl = $activity->image ? Storage::url($activity->image) : Vite::asset('resources/assets/img/slider/aaa.jpg');
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $activity->nom }}">
                            </div>
                            <div class="blog__details-content">
                                <div class="blog__post-meta blog__post-meta-three">
                                    <ul class="list-wrap">
                                        <li>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.1111 2V4.80003M5.88888 2V4.80003M2 7.59992H16M3.55556 3.39988H14.4444C15.3036 3.39988 16 4.02668 16 4.79989V14.6C16 15.3732 15.3036 16 14.4444 16H3.55556C2.69645 16 2 15.3732 2 14.6V4.79989C2 4.02668 2.69645 3.39988 3.55556 3.39988Z" stroke="currentColor" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $activity->date_debut ? \Carbon\Carbon::parse($activity->date_debut)->format('d/m/Y') : 'Date non disponible' }}
                                        </li>
                                        <li>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.1111 2V4.80003M5.88888 2V4.80003M2 7.59992H16M3.55556 3.39988H14.4444C15.3036 3.39988 16 4.02668 16 4.79989V14.6C16 15.3732 15.3036 16 14.4444 16H3.55556C2.69645 16 2 15.3732 2 14.6V4.79989C2 4.02668 2.69645 3.39988 3.55556 3.39988Z" stroke="currentColor" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ $activity->date_fin ? \Carbon\Carbon::parse($activity->date_fin)->format('d/m/Y') : 'Date non disponible' }}
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="title">{{ $activity->nom ?? 'Activité sans nom' }}</h2>
                                <p>Parfois, il est utile de recevoir un petit coup de main de nos amis. Bien que nous offrions la commodité d'une gamme complète de services intégrés, il arrive que nos clients aient besoin de conseils spécialisés pour améliorer leur santé et leur bien-être.</p>
                                <p>Pour maintenir un bon équilibre physique et mental, il est essentiel de participer régulièrement à des activités variées : sport, yoga, méditation, randonnées, et autres exercices adaptés à chacun. Ces activités aident à renforcer le corps, à réduire le stress et à favoriser une meilleure qualité de vie.</p>
                                <blockquote>
                                    <p>{{ $activity->description ?? 'Aucune description disponible' }}</p>
                                </blockquote>
                                <p>Pour conserver un mode de vie sain, il est conseillé de pratiquer des activités régulières et adaptées à vos besoins. Que ce soit une séance de sport, une promenade dans la nature ou un moment de relaxation, chaque effort contribue à votre bien-être général et à une vie plus équilibrée.</p>
                                <div class="blog__details-inner">
                                    <div class="row align-items-center">
                                        <div class="col-46 order-0 order-md-2">
                                            <div class="blog__details-inner-thumb">
                                                @if ($activity->support_video)
                                                    <video width="100%" controls>
                                                        <source src="{{ Storage::url($activity->support_video) }}" type="video/mp4">
                                                        Votre navigateur ne prend pas en charge la lecture de vidéos.
                                                    </video>
                                                @else
                                                    <img src="{{ Vite::asset('resources/assets/img/blog/blog_img02.jpg') }}" alt="Image par défaut">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-54">
                                            <div class="blog__details-inner-content">
                                                <h4 class="title">Suivi Intelligent de Votre Santé</h4>
                                                <p>Un tracker de santé intelligent pour vous aider à rester en bonne santé grâce à une surveillance précise et des conseils personnalisés.</p>
                                                <ul class="list-wrap about__list about__list-four">
                                                    <li>
                                                        <div class="icon">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                                                <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        Suivi précis de l'activité physique
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                                                <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        Surveillance du sommeil
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                                                <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        Conseils personnalisés pour la santé
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                                                <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        Fiabilité et confort au quotidien
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="title-two">Support PDF</h4>
                                @if ($activity->support_pdf)
                                    <p>
                                        <iframe src="{{ Storage::url($activity->support_pdf) }}" width="100%" height="500px" style="border: none;"></iframe>
                                    </p>
                                @else
                                    <p>Aucun document PDF disponible pour cette activité.</p>
                                @endif
                                <div class="blog__details-bottom">
                                    <div class="row">
                                        <div class="col-md-7">
                                           
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                          
                            <!-- Section des commentaires existants -->
                            <div class="comments-wrap">
                                <h3 class="comments-wrap-title">Commentaires & Avis ({{ $activity->comments->count() }})</h3>
                                <div class="latest-comments">
                                    <ul class="list-wrap">
                                        @forelse ($activity->comments as $comment)
                                            <li class="existing-comment">
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="{{ $comment->user->profile_image ?? Vite::asset('resources/assets/img/photo.png') }}" alt="Avatar">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h6 class="comment-user">{{ $comment->user->name }}</h6>
                                                            <span class="comment-date">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                                                        </div>
                                                        <!-- AFFICHAGE CORRIGÉ DES ÉTOILES -->
                                                        <div class="comment-stars">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if($i <= $comment->rating)
                                                                    ⭐
                                                                @else
                                                                    ☆
                                                                @endif
                                                            @endfor
                                                            <span class="rating-text">({{ $comment->rating }}/5)</span>
                                                        </div>
                                                        <p class="comment-text">{{ $comment->comment }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li>Aucun commentaire pour le moment. Soyez le premier à en laisser un !</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            <!-- Formulaire simplifié pour ajouter un commentaire avec étoiles -->
                            @auth
                                <div class="comment-respond">
                                    <h4 class="comment-respond-title">Laisser un commentaire</h4>
                                    <form action="{{ route('activities.comments.store', $activity->id) }}" method="POST">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Votre commentaire</label>
                                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                                        </div>
                                        
                                        <!-- ⭐ Système d'étoiles interactif -->
                                        <div class="mb-3">
                                            <label class="form-label">Note</label>
                                            <div class="star-rating-interactive">
                                                <span class="star-interactive" data-rating="1">☆</span>
                                                <span class="star-interactive" data-rating="2">☆</span>
                                                <span class="star-interactive" data-rating="3">☆</span>
                                                <span class="star-interactive" data-rating="4">☆</span>
                                                <span class="star-interactive" data-rating="5">☆</span>
                                            </div>
                                            <input type="hidden" name="rating" id="selected-rating" value="" required>
                                            <div class="rating-text text-muted mt-1" id="rating-text">Cliquez sur les étoiles pour noter</div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Publier le commentaire</button>
                                    </form>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <p>Connectez-vous pour laisser un commentaire et noter cette activité !</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="col-30">
                        <aside class="blog__sidebar blog__sidebar-two">
                            <div class="sidebar__widget">
                               
                            </div>
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Séances & Activités</h4>
                                <div class="rc-post-wrap">
                                    <div class="rc-post-item">
                                        <div class="thumb">
                                            <a href="{{ route('activities.detail', $activity->id) }}"><img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <span class="date">
                                             
                                            </span>
                                            <h2 class="title"><a href="{{ route('activities.detail', $activity->id) }}">Suivi complet des activités et indicateurs de santé</a></h2>
                                        </div>
                                    </div>
                                    <div class="rc-post-item">
                                        <div class="thumb">
                                            <a href="{{ route('activities.detail', $activity->id) }}"><img src="{{ Vite::asset('resources/assets/img/blog/blog_img02.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <span class="date">
                                              
                                            </span>
                                            <h2 class="title"><a href="{{ route('activities.detail', $activity->id) }}">Séances de musculation et tonus musculaire</a></h2>
                                        </div>
                                    </div>
                                    <div class="rc-post-item">
                                        <div class="thumb">
                                            <a href="{{ route('activities.detail', $activity->id) }}"><img src="{{ Vite::asset('resources/assets/img/blog/blog_img03.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <span class="date">
                                              
                                            </span>
                                            <h2 class="title"><a href="{{ route('activities.detail', $activity->id) }}">Yoga, Pilates et étirements</a></h2>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Équipements</h4>
                                <div class="bs-cat-list">
                                    <ul class="list-wrap">
                                        @forelse ($activity->equipments as $equipment)
                                            <li><a href="#">{{ $equipment->nom ?? 'Équipement sans nom' }}</a></li>
                                        @empty
                                            <li>Aucun équipement disponible</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Tags Populaires</h4>
                                <div class="sidebar__tag-list">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html">Nutrition</a></li>
                                        <li><a href="blog.html">Fitness</a></li>
                                        <li><a href="blog.html">Yoga</a></li>
                                        <li><a href="blog.html">Santé Mentale</a></li>
                                        <li><a href="blog.html">Sommeil</a></li>
                                        <li><a href="blog.html">Hydratation</a></li>
                                        <li><a href="blog.html">Bien-être</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar__widget">
                             
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
    <!-- main-area-end -->
@endsection

@push('frontoffice-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Système d'étoiles interactif pour le formulaire
            const stars = document.querySelectorAll('.star-interactive');
            const ratingInput = document.getElementById('selected-rating');
            const ratingText = document.getElementById('rating-text');
            
            const ratingMessages = {
                1: "Mauvais - 1/5",
                2: "Moyen - 2/5", 
                3: "Bon - 3/5",
                4: "Très bon - 4/5",
                5: "Excellent - 5/5"
            };

            // Fonction pour mettre à jour les étoiles
            function updateStars(rating) {
                stars.forEach((star) => {
                    const starRating = parseInt(star.getAttribute('data-rating'));
                    if (starRating <= rating) {
                        star.textContent = '⭐';
                        star.classList.add('active');
                    } else {
                        star.textContent = '☆';
                        star.classList.remove('active');
                    }
                });
            }

            // Événements pour les étoiles
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.getAttribute('data-rating'));
                    ratingInput.value = rating;
                    updateStars(rating);
                    ratingText.textContent = ratingMessages[rating];
                    ratingText.className = 'rating-text text-warning mt-1';
                });

                star.addEventListener('mouseover', function() {
                    const hoverRating = parseInt(this.getAttribute('data-rating'));
                    stars.forEach((s) => {
                        const starRating = parseInt(s.getAttribute('data-rating'));
                        s.style.color = starRating <= hoverRating ? '#ffd700' : '#ddd';
                    });
                });

                star.addEventListener('mouseout', function() {
                    const currentRating = parseInt(ratingInput.value) || 0;
                    stars.forEach((s) => {
                        s.style.color = '';
                    });
                    updateStars(currentRating);
                });
            });

            // Validation du formulaire
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    if (!ratingInput.value) {
                        e.preventDefault();
                        ratingText.textContent = 'Veuillez sélectionner une note avant de soumettre !';
                        ratingText.className = 'rating-text text-danger mt-1';
                        
                        stars.forEach(star => {
                            star.style.animation = 'shake 0.5s';
                        });
                        setTimeout(() => {
                            stars.forEach(star => {
                                star.style.animation = '';
                            });
                        }, 500);
                    }
                });
            }

            // Auto-fermeture de l'alerte en haut de page
            const alert = document.getElementById('alert-message');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'all 0.3s ease';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-50px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, 4000);
            }
        });
    </script>
@endpush