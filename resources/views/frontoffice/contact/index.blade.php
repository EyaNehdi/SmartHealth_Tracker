@extends('shared.layouts.frontoffice')

@section('page-title', 'Contact - SmartHealth Tracker')

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
                            <h2 class="title">Contact</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Contact</span>
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

        <!-- contact-area -->
        <section class="contact__area section-py-150">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact__info-wrap">
                            <h3>Nous contacter</h3>
                            <div class="contact__info-item">
                                <h4 class="title">Adresse</h4>
                                <p>rue ariana soghra, ariana, tunis</p>
                            </div>
                            <div class="contact__info-item">
                                <h4 class="title">Téléphone</h4>
                                <p>+216 50711106</p>
                            </div>
                            <div class="contact__info-item">
                                <h4 class="title">Email</h4>
                                <p>contact@smarthealthtracker.com</p>
                            </div>
                            <div class="contact__info-item">
                                <h4 class="title">Horaires</h4>
                                <p>Lundi - Vendredi : 9h-18h<br>
                                Samedi : 10h-16h<br>
                                Dimanche : Fermé</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact__form-wrap">
                            <h2 class="title">Envoyez-nous un message</h2>
                            <form method="POST" action="{{ route('contact.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="name" class="form-label fw-bold">Nom <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Votre nom" value="{{ old('name') }}" >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                               placeholder="votre@email.com" value="{{ old('email') }}"
                                               >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="subject" class="form-label fw-bold">Sujet <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror"
                                           placeholder="Objet de votre message" value="{{ old('subject') }}" >
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="message" class="form-label fw-bold">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"
                                              rows="6" placeholder="Dites-nous en plus sur votre demande..."   >{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Envoyer le message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
@endsection
