
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Oxinex - Health Supplement HTML Template</title>
    <meta name="description" content="Oxinex - Health Supplement HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/assets/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/magnific-popup.css'])
    @vite(['resources/assets/css/swiper-bundle.min.css'])
    @vite(['resources/assets/css/slick.css'])
    @vite(['resources/assets/css/default-icons.css'])
    @vite(['resources/assets/css/default.css'])
    @vite(['resources/assets/css/sal.css'])
    @vite(['resources/assets/css/tg-cursor.css'])
    @vite(['resources/assets/css/main.css'])
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ Vite::asset('resources/assets/img/logo/preloader.svg') }}" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!-- Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L1 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
    <!-- Scroll-top-end -->

    <!-- header-area -->
  <x-app-layout>
    <!-- header-area-end -->

    <!-- main-area -->
    <main class="main-area fix">
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">activities</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index-2.html">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">activities</span>
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

        <!-- contact-area -->
        <section class="contact__area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact__form-wrap">
                    <div class="container mt-5">
                        <h2 class="mb-4 text-center">Modifier une Activité</h2>

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

                        <form method="POST" action="{{ route('activities.update', $activity->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-grp mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $activity->nom) }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-grp mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $activity->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-grp mb-3">
                                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $activity->date->format('Y-m-d\TH:i')) }}" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-grp mb-3">
                                <label for="duree" class="form-label">Durée (en minutes)</label>
                                <input type="number" name="duree" id="duree" class="form-control @error('duree') is-invalid @enderror" value="{{ old('duree', $activity->duree) }}" min="0">
                                @error('duree')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                          

                            <div class="form-grp mb-3">
                                <label for="equipments" class="form-label">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px;">
                                        <path d="M3 9h12" stroke="#6b7280" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M9 3v12" stroke="#6b7280" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    Équipements utilisés
                                </label>
                                <select name="equipments[]" id="equipments" class="form-control @error('equipments') is-invalid @enderror" multiple>
                                    <option value="">Sélectionner des équipements</option>
                                    @foreach ($equipments as $equipment)
                                        <option value="{{ $equipment->id }}" {{ in_array($equipment->id, old('equipments', $activity->equipments->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $equipment->nom }} ({{ $equipment->type }})</option>
                                    @endforeach
                                </select>
                                @error('equipments')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-grp mb-3">
                                <label for="equipment_comment" class="form-label">Commentaire sur l’utilisation des équipements</label>
                                <textarea name="equipment_comment" id="equipment_comment" class="form-control @error('equipment_comment') is-invalid @enderror" rows="4">{{ old('equipment_comment', $activity->equipments->isNotEmpty() ? $activity->equipments->first()->pivot->commentaire : '') }}</textarea>
                                @error('equipment_comment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           

                            <div class="text-center">
                                <button type="submit" class="tg-btn tg-btn-three black-btn">Modifier</button>
                            </div>
                        </form>
                        <p class="ajax-response mb-0 text-center"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- contact-area-end -->

      
        <!-- contact-map-end -->
    </main>

    <!-- footer-area -->
</x-app-layout>
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


<!-- Mirrored from themeadapt.com/tf/oxinex/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 21:11:27 GMT -->
</html>