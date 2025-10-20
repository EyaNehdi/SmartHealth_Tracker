
@extends('shared.layouts.frontoffice')

@section('page-title', 'Objectifs - SmartHealth Tracker')

@section('content')

    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Objectifs</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Objectifs</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__bg-shape">
                <span class="bottom-shape"
                    data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- notifications-area -->
        <section class="notifications__area section-py-50">
            <div class="container">
                @auth
                    @php
                        $notifications = auth()->user()->unreadNotifications()->get();
                    @endphp
                    @if ($notifications->isNotEmpty())
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <h4><i class="fas fa-bell me-2"></i> Notifications</h4>
                            <ul class="list-group">
                                @foreach ($notifications as $notification)
                                    <li class="list-group-item">
                                        {{ $notification->data['message'] }}
                                        <a href="{{ $notification->data['url'] }}" class="btn btn-link">Voir</a>
                                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Marquer comme lu</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                @endauth
            </div>
        </section>
        <!-- notifications-area-end -->

        <!-- challenges-area -->
        <section class="blog__post-area section-py-150">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 order-0 order-lg-2">
                        <div class="inner-blog-post-wrap">
                            @forelse($allChallenges as $challenge)
                                <div class="card mb-4 shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $challenge->image ? asset('storage/' . $challenge->image) : Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}"
                                                 alt="{{ $challenge->titre }}" class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h3 class="card-title">{{ $challenge->titre }}</h3>
                                                <p class="card-text">{{ Str::limit($challenge->description, 150) }}</p>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <i class="fas fa-calendar-alt me-2"></i>
                                                        <strong>Période :</strong> {{ $challenge->dateDebut->format('d/m/Y') }} - {{ $challenge->dateFin->format('d/m/Y') }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fas fa-users me-2"></i>
                                                        <strong>Participants :</strong> {{ $challenge->participations_count }}
                                                        @if ($challenge->is_famous)
                                                            <span class="badge bg-primary ms-2">Challenge Célèbre</span>
                                                        @elseif ($challenge->participations_count > 5)
                                                            <span class="badge bg-success ms-2">Challenge Populaire</span>
                                                        @endif
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fas fa-user me-2"></i>
                                                        <strong>Créé par :</strong> {{ $challenge->creator->name }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fas fa-clock me-2"></i>
                                                        <strong>Créé le :</strong> {{ $challenge->created_at->format('d/m/Y H:i') }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fas fa-chart-line me-2"></i>
                                                        <strong>Progression :</strong>
                                                        @php
                                                            $now = now();
                                                            $start = $challenge->dateDebut;
                                                            $end = $challenge->dateFin;
                                                            $totalDays = $start->diffInDays($end);
                                                            $progress = $totalDays > 0 ? min(100, ($start->diffInDays($now) / $totalDays) * 100) : 0;
                                                            $status = $now < $start ? 'Non commencé' : ($now > $end ? 'Terminé' : 'En cours');
                                                        @endphp
                                                        <div class="progress" style="height: 20px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                 style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                                                 aria-valuemin="0" aria-valuemax="100">
                                                                {{ round($progress) }}%
                                                            </div>
                                                        </div>
                                                        <small class="text-muted">{{ $status }}</small>
                                                    </li>
                                                </ul>
                                                <div class="mt-3 d-flex gap-2">
                                                    @if (auth()->check() && $challenge->isParticipatedBy(auth()->id()))
                                                        <a href="{{ route('groups.index', $challenge->id) }}"
                                                           class="btn btn-primary">Voir le chat de groupe</a>
                                                    @else
                                                        <button class="btn btn-success" data-bs-toggle="modal"
                                                                data-bs-target="#participationModal{{ $challenge->id }}">Participer</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Participation Modal -->
                                <div class="modal fade" id="participationModal{{ $challenge->id }}" tabindex="-1"
                                     aria-labelledby="participationModalLabel{{ $challenge->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('participations.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="participationModalLabel{{ $challenge->id }}">
                                                        Participer à : {{ $challenge->titre }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                    <p><strong>Utilisateur :</strong> {{ auth()->user()->name }}</p>
                                                    <div class="mb-3">
                                                        <label for="comment{{ $challenge->id }}" class="form-label">Commentaire (Optionnel)</label>
                                                        <textarea name="comment" id="comment{{ $challenge->id }}"
                                                                  class="form-control" rows="4"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image{{ $challenge->id }}" class="form-label">Image (Optionnelle)</label>
                                                        <input type="file" name="image" id="image{{ $challenge->id }}"
                                                               class="form-control" accept="image/*">
                                                        <small class="form-text text-muted">Formats acceptés : JPG, PNG, JPEG. Taille max : 2MB</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Participer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>Aucun objectif trouvé. Créez-en un ou modifiez vos critères de recherche !
                                </div>
                            @endforelse

                            <!-- Pagination -->
                            @if ($allChallenges->hasPages())
                                <nav class="pagination__wrap mt-40">
                                    <ul class="pagination list-wrap">
                                        @if ($allChallenges->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">« Précédent</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $allChallenges->previousPageUrl() }}">« Précédent</a>
                                            </li>
                                        @endif

                                        @foreach ($allChallenges->getUrlRange(1, $allChallenges->lastPage()) as $page => $url)
                                            <li class="page-item {{ $allChallenges->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($allChallenges->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $allChallenges->nextPageUrl() }}">Suivant »</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Suivant »</span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            <div class="sidebar__widget">
                                <form action="{{ route('challenges.index') }}" method="GET" class="blog__search">
                                    <div class="input-group">
                                        <input type="text" name="query" class="form-control"
                                               placeholder="Rechercher un objectif..." value="{{ $search ?? '' }}">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            @if ($mostParticipated)
                                <div class="sidebar__widget">
                                    <h4 class="sidebar__widget-title">Objectif le plus populaire</h4>
                                    <div class="rc-post-wrap">
                                        <div class="rc-post-item">
                                            <div class="thumb">
                                                <img src="{{ $mostParticipated->image ? asset('storage/' . $mostParticipated->image) : Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}"
                                                     alt="{{ $mostParticipated->titre }}" class="img-fluid rounded">
                                            </div>
                                            <div class="content">
                                                <span class="date">
                                                    <i class="fas fa-calendar-alt me-2"></i>
                                                    {{ $mostParticipated->dateDebut->format('d/m/Y') }} - {{ $mostParticipated->dateFin->format('d/m/Y') }}
                                                </span>
                                                <h5 class="title">
                                                    <a href="{{ route('groups.index', $mostParticipated->id) }}">{{ $mostParticipated->titre }}</a>
                                                </h5>
                                                <p>{{ $mostParticipated->participations_count }} participants
                                                    @if ($mostParticipated->is_famous)
                                                        <span class="badge bg-primary ms-2">Challenge Célèbre</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Catégories</h4>
                                <div class="bs-cat-list">
                                    <ul class="list-wrap">
                                        <li><a href="{{ route('challenges.index', ['category' => 'sport']) }}">Sport <span>(02)</span></a></li>
                                        <li><a href="{{ route('challenges.index', ['category' => 'fitness']) }}">Fitness <span>(08)</span></a></li>
                                        <li><a href="{{ route('challenges.index', ['category' => 'regime']) }}">Régime <span>(05)</span></a></li>
                                        <li><a href="{{ route('challenges.index', ['category' => 'sleep']) }}">Sommeil <span>(02)</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar__widget">
                                <div class="sidebar__contact">
                                    <h4 class="title">Plus de 10 ans d'expérience en fitness</h4>
                                    <p>Rejoignez notre communauté pour atteindre vos objectifs de santé et de bien-être.</p>
                                    <a href="{{ route('challenges.create') }}" class="btn btn-primary">Créer un Objectif</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- challenges-area-end -->

    </main>
@endsection

