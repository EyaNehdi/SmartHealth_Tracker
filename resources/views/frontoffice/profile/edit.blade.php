@extends('shared.layouts.frontoffice')

@section('page-title', 'Edit Profile - SmartHealth Tracker')

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
                            <h2 class="title">Profil</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Profil</span>
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

        <!-- profile-area -->
        <section class="shop__area section-py-150">
            <div class="container">
                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="shop-item-wrap">
                            <div class="row gutter-y-30">
                                <!-- Profile Information Card -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                                                    <path d="M10 9C11.6569 9 13 7.65685 13 6C13 4.34315 11.6569 3 10 3C8.34315 3 7 4.34315 7 6C7 7.65685 8.34315 9 10 9Z" fill="#22c55e"/>
                                                    <path d="M10 11C7.23858 11 5 13.2386 5 16H15C15 13.2386 12.7614 11 10 11Z" fill="#22c55e"/>
                                                </svg>
                                                Informations du Profil
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            @include('frontoffice.profile.partials.update-profile-information-form')
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Update Card -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                                                    <path d="M15 8H14V6C14 3.79 12.21 2 10 2S6 3.79 6 6V8H5C4.45 8 4 8.45 4 9V19C4 19.55 4.45 20 5 20H15C15.55 20 16 19.55 16 19V9C16 8.45 15.55 8 15 8ZM10 16C9.45 16 9 15.55 9 15S9.45 14 10 14S11 14.45 11 15S10.55 16 10 16ZM12 8H8V6C8 4.9 8.9 4 10 4S12 4.9 12 6V8Z" fill="#3b82f6"/>
                                                </svg>
                                                Modifier le Mot de Passe
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            @include('frontoffice.profile.partials.update-password-form')
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Actions Card -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                                                    <path d="M10 2C5.58 2 2 5.58 2 10C2 14.42 5.58 18 10 18C14.42 18 18 14.42 18 10C18 5.58 14.42 2 10 2ZM10 16C6.69 16 4 13.31 4 10C4 6.69 6.69 4 10 4C13.31 4 16 6.69 16 10C16 13.31 13.31 16 10 16ZM10 6C8.9 6 8 6.9 8 8S8.9 10 10 10S12 9.1 12 8S11.1 6 10 6ZM10 12C8.34 12 6.5 10.5 6.5 8.5C6.5 6.5 8.34 5 10 5C11.66 5 13.5 6.5 13.5 8.5C13.5 10.5 11.66 12 10 12Z" fill="#ef4444"/>
                                                </svg>
                                                Actions du Compte
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            @include('frontoffice.profile.partials.delete-user-form')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-30">
                        <aside class="shop__sidebar">
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Profil Utilisateur</h4>
                                <div class="rc-post-wrap">
                                    <div class="rc-post-item">
                                        <div class="thumb">
                                            <img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}" alt="Profile">
                                        </div>
                                        <div class="content">
                                            <h2 class="title">{{ auth()->user()->name }}</h2>
                                            <p>{{ auth()->user()->email }}</p>
                                            @if(auth()->user()->hasVerifiedEmail())
                                                <span class="badge bg-success">Email vérifié</span>
                                            @else
                                                <span class="badge bg-warning">Email non vérifié</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Statistiques</h4>
                                <div class="bs-cat-list">
                                    <ul class="list-wrap">
                                        <li><a href="#">Challenges créés <span>({{ auth()->user()->challengesCreated()->count() }})</span></a></li>
                                        <li><a href="#">Participations <span>({{ auth()->user()->participations()->count() }})</span></a></li>
                                        <li><a href="#">Activités <span>(0)</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar__widget">
                                <div class="sidebar__contact">
                                    <h4 class="title">Besoin d'aide ?</h4>
                                    <p>Contactez notre équipe de support pour toute question concernant votre profil.</p>
                                    <a href="#" class="tg-btn tg-btn-three">Nous Contacter</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- profile-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
