@extends('shared.layouts.frontoffice')

@section('page-title', 'Activités Recommandées - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Activités Recommandées</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Accueil</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>Activités Recommandées</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="shop__area section-py-150">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-4 shadow-sm bg-white">
                            <!-- En-tête avec préférences -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h4 class="mb-1">🎯 Activités recommandées pour vous</h4>
                                    @if ($user->preferences->count() > 0)
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            @foreach ($user->preferences as $preference)
                                                <span class="badge bg-primary">
                                                    <i class="fas fa-tag me-1"></i> {{ $preference->tag }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Liste des activités recommandées -->
                            <div class="row g-4">
                                @if($activities->count() > 0)
                                    @foreach ($activities as $activity)
                                        @php
                                            $isPaidActivity = $activity->prix && $activity->prix > 0;
                                            $hasPaid = $activity->hasPaid($user->id);
                                            $isFreeOrPaid = !$isPaidActivity || $hasPaid;
                                            
                                            // Gestion sécurisée des dates
                                            $dateDebut = null;
                                            if ($activity->date_debut) {
                                                if ($activity->date_debut instanceof \Carbon\Carbon) {
                                                    $dateDebut = $activity->date_debut->format('d/m/Y');
                                                } else {
                                                    try {
                                                        $dateDebut = \Carbon\Carbon::parse($activity->date_debut)->format('d/m/Y');
                                                    } catch (\Exception $e) {
                                                        $dateDebut = 'Date non définie';
                                                    }
                                                }
                                            } else {
                                                $dateDebut = 'Date non définie';
                                            }
                                        @endphp

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            @if ($isFreeOrPaid)
                                                <a href="{{ route('activities.detail', $activity->id) }}" class="text-decoration-none">
                                            @else
                                                <a href="{{ route('activities.checkout', $activity->id) }}" class="text-decoration-none">
                                            @endif
                                                <div class="position-relative">
                                                    <!-- Badge Recommandé -->
                                                    <span class="position-absolute top-0 end-0 badge bg-warning text-dark me-2 mt-2 z-20">
                                                        <i class="fas fa-star me-1"></i> Recommandé
                                                    </span>

                                                    @if ($isPaidActivity)
                                                        <span class="position-absolute top-0 start-0 badge bg-warning text-dark ms-2 mt-2 z-20">
                                                            {{ $hasPaid ? 'Accès Débloqué' : 'Payant' }}
                                                        </span>
                                                    @else
                                                        <span class="position-absolute top-0 start-0 badge bg-success ms-2 mt-2 z-20">
                                                            Gratuit
                                                        </span>
                                                    @endif

                                                    <div class="card h-100 text-center border rounded shadow-sm">
                                                        <img src="{{ $activity->image ? Storage::url($activity->image) : Vite::asset('resources/assets/img/slider/aaa.jpg') }}" 
                                                             class="card-img-top" alt="{{ $activity->nom }}" 
                                                             style="height: 180px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $activity->nom }}</h5>
                                                            <p class="card-text text-muted small">
                                                                <i class="fas fa-calendar-alt me-1"></i>
                                                                {{ $dateDebut }}
                                                            </p>
                                                            <p class="card-text">{{ Str::limit($activity->description, 80) }}</p>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-between align-items-center">
                                                            @if ($activity->prix)
                                                                <span class="text-success fw-bold">{{ number_format($activity->prix, 2) }} €</span>
                                                                @if ($hasPaid)
                                                                    <span class="badge bg-success">Déjà payé</span>
                                                                @else
                                                                    <span class="badge bg-warning text-dark">À réserver</span>
                                                                @endif
                                                            @else
                                                                <span class="text-success fw-bold">Gratuit</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center py-5">
                                        <div class="alert alert-warning">
                                            <h5>🔍 Aucune activité recommandée trouvée</h5>
                                            <p class="mb-3">
                                                Nous n'avons trouvé aucune activité correspondant à vos préférences 
                                                <strong>
                                                    @foreach($user->preferences as $preference)
                                                        "{{ $preference->tag }}"
                                                    @endforeach
                                                </strong>.
                                            </p>
                                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                <a href="{{ route('preferences.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-edit me-1"></i> Modifier mes préférences
                                                </a>
                                                <a href="{{ route('activities.front') }}" class="btn btn-outline-secondary">
                                                    <i class="fas fa-list me-1"></i> Voir toutes les activités
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Lien de retour -->
                            <div class="text-center mt-4">
                                <a href="{{ route('activities.front') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-1"></i> Retour à toutes les activités
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection