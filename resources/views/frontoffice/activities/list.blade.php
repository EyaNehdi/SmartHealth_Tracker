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
                            <h2 class="title">Liste des activities</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Liste des activities</span>
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
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updated') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-70 order-0 order-lg-2">
               <div class="shop__top-wrap">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-7">
    <div class="shop__top-left d-flex align-items-center justify-content-between">
    <p class="mb-2">Affichage de {{ count($activities) }} activité(s)</p>
<a href="/activities/create" class="tg-btn tg-btn-three black-btn mt-1">Ajouter</a>
</div>



        </div>
    </div>
</div>

                <div class="shop-item-wrap">
                    <div class="row gutter-y-30 gutter-20">
                        @forelse ($activities as $activity)
                            <div class="col-lg-4 col-6">
                                <div class="card">
                                    <!-- Image en haut de la carte -->
                                    <a href="#"><img src="{{ Vite::asset('resources/assets/img/slider/aaa.jpg') }}" class="card-img-top" alt="{{ $activity->nom }}"></a>
                                    <!-- Informations sous l'image -->
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $activity->nom }}</h2>
                                        <p class="card-text"><strong>Date :</strong> {{ $activity->date ? $activity->date->format('d/m/Y H:i') : 'Non défini' }}</p>
                                        <p class="card-text"><strong>Durée :</strong> {{ $activity->duree ? $activity->duree . ' minutes' : 'Non définie' }}</p>
<p class="card-text">
    @if ($activity->equipments->isNotEmpty())
        <ul class="list-unstyled">
            @foreach ($activity->equipments as $equipment)
                <li><strong>Équipement :</strong> {{ $equipment->nom }} ({{ $equipment->type }}) </li>
            @endforeach
        </ul>
    @else
        Aucune
    @endif
</p>                                        <div class="actions mt-2">
                                            <!-- Icône de modification (vert) -->
                                            <a href="{{ route('activities.edit', $activity->id) }}" title="Modifier">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.1 3.15H3.15C2.47924 3.15 1.83599 3.40875 1.35449 3.87025C0.872987 4.33175 0.6 4.9575 0.6 5.625V14.625C0.6 15.2925 0.872987 15.9182 1.35449 16.3797C1.83599 16.8413 2.47924 17.1 3.15 17.1H12.15C12.8208 17.1 13.464 16.8413 13.9455 16.3797C14.427 15.9182 14.7 15.2925 14.7 14.625V9.675C14.7 9.34125 14.5665 9.02025 14.3258 8.7795C14.085 8.53875 13.764 8.4 13.4325 8.4C13.101 8.4 12.78 8.53875 12.5393 8.7795C12.2985 9.02025 12.165 9.34125 12.165 9.675V14.625H3.15V5.625H8.1C8.43375 5.625 8.75475 5.4915 8.9955 5.25075C9.23625 5.01 9.375 4.689 9.375 4.3575C9.375 4.02525 9.23625 3.705 8.9955 3.46425C8.75475 3.2235 8.43375 3.15 8.1 3.15ZM15.975 3.9375L9.225 10.6875L6.975 11.025C6.71625 11.0625 6.4875 10.8375 6.525 10.575L6.8625 8.325L13.6125 1.575C13.8533 1.33425 14.1743 1.2 14.505 1.2C14.8358 1.2 15.1568 1.33425 15.3975 1.575L16.425 2.6025C16.6658 2.84325 16.8 3.16425 16.8 3.495C16.8 3.82575 16.6658 4.14675 16.425 4.3875L15.975 3.9375Z" fill="#22c55e"/>
                                                </svg>
                                            </a>
                                            <!-- Icône de suppression (rouge) -->
                                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-0 border-0 bg-transparent" title="Supprimer">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.25 4.5H3.75H15.75" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6.75 4.5V3C6.75 2.60218 6.90804 2.22064 7.18934 1.93934C7.47064 1.65804 7.85218 1.5 8.25 1.5H9.75C10.1478 1.5 10.5294 1.65804 10.8107 1.93934C11.092 2.22064 11.25 2.60218 11.25 3V4.5M13.5 4.5V15C13.5 15.3978 13.342 15.7794 13.0607 16.0607C12.7794 16.342 12.3978 16.5 12 16.5H6C5.60218 16.5 5.22064 16.342 4.93934 16.0607C4.65804 15.3978 4.5 15V4.5H13.5Z" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M7.5 8.25V12.75" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10.5 8.25V12.75" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>Aucune activité trouvée.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Sidebar avec formulaires de recherche et filtres indépendants -->
            <div class="col-30">
                <aside class="shop__sidebar">
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">
                           
                            <!-- Icône de réinitialisation -->
                            <a href="{{ route('activities.index') }}" title="Réinitialiser les filtres" style="margin-right: 5px;">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 3V1.5L6.75 3.75L9 6V4.5C11.4825 4.5 13.5 6.5175 13.5 9C13.5 9.795 13.2975 10.545 12.945 11.1975L14.115 12.3675C14.73 11.43 15.09 10.2975 15.09 9C15.09 5.6925 12.3075 3 9 3ZM9 13.5C6.5175 13.5 4.5 11.4825 4.5 9C4.5 8.205 4.7025 7.455 5.055 6.8025L3.885 5.6325C3.27 6.57 2.91 7.7025 2.91 9C2.91 12.3075 5.6925 15 9 15V16.5L11.25 14.25L9 12V13.5Z" fill="#22c55e"/>
                                </svg>
                            </a>
                            Rechercher et Filtrer
                        </h4>
                        <!-- Formulaire de recherche par mot-clé -->
                        <form action="{{ route('activities.index') }}" method="GET" class="mb-4">
                            <div class="form-grp">
                                <label for="search">Rechercher</label>
                                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Mot-clé (nom ou description)">
                            </div>
                            <button type="submit" class="tg-btn tg-btn-three black-btn mt-2">Rechercher</button>
                        </form>
                        
                        <!-- Formulaire de filtrage par date -->
                        <form action="{{ route('activities.index') }}" method="GET">
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
    </div>
</section>
        <!-- categories-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
@endsection
    <!-- footer-area-end -->

    <!-- JS here -->
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
</body>

</html>
