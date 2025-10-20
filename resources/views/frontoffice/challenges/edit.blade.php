@extends('shared.layouts.frontoffice')

@section('page-title', 'Edit Challenge - SmartHealth Tracker')

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
                            <h2 class="title"> Ajouter un Objectif</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Objectif</span>
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
        <section class="contact__area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact__info-wrap">
                            <div class="contact__info-item">
                                <h4 class="title">NewYork City</h4>
                                <p>14 West Arnold St. New York, NY 10002</p>
                                <ul class="list-wrap">
                                    <li>
                                        <a href="tel:0123456789">(+1) 123-456-3389</a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@oxinex.com">Sales@oxinex.com</a>
                                    </li>
                                </ul>
                                <div class="shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="174" height="210"
                                        viewBox="0 0 174 210" fill="none">
                                        <path
                                            d="M168.636 86.8182C168.636 150.455 86.8182 205 86.8182 205C86.8182 205 5 150.455 5 86.8182C5 65.1187 13.6201 44.3079 28.964 28.964C44.3079 13.6201 65.1187 5 86.8182 5C108.518 5 129.328 13.6201 144.672 28.964C160.016 44.3079 168.636 65.1187 168.636 86.8182Z"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M86.8182 114.091C101.88 114.091 114.091 101.88 114.091 86.8182C114.091 71.7559 101.88 59.5455 86.8182 59.5455C71.7559 59.5455 59.5455 71.7559 59.5455 86.8182C59.5455 101.88 71.7559 114.091 86.8182 114.091Z"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="contact__info-item">
                                <h4 class="title">France</h4>
                                <p>6580 Allison Turnpike, AL 32808-4509</p>
                                <ul class="list-wrap">
                                    <li>
                                        <a href="tel:0123456789">(+1) 123-456-3389</a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@oxinex.com">Sales@oxinex.com</a>
                                    </li>
                                </ul>
                                <div class="shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="174" height="210"
                                        viewBox="0 0 174 210" fill="none">
                                        <path
                                            d="M168.636 86.8182C168.636 150.455 86.8182 205 86.8182 205C86.8182 205 5 150.455 5 86.8182C5 65.1187 13.6201 44.3079 28.964 28.964C44.3079 13.6201 65.1187 5 86.8182 5C108.518 5 129.328 13.6201 144.672 28.964C160.016 44.3079 168.636 65.1187 168.636 86.8182Z"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M86.8182 114.091C101.88 114.091 114.091 101.88 114.091 86.8182C114.091 71.7559 101.88 59.5455 86.8182 59.5455C71.7559 59.5455 59.5455 71.7559 59.5455 86.8182C59.5455 101.88 71.7559 114.091 86.8182 114.091Z"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="contact__info-item">
                                <h4 class="title">Italy City</h4>
                                <p>14 West Arnold St. New York, NY 10002</p>
                                <ul class="list-wrap">
                                    <li>
                                        <a href="tel:0123456789">(+1) 123-456-3389</a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@oxinex.com">Sales@oxinex.com</a>
                                    </li>
                                </ul>
                                <div class="shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="174" height="210"
                                        viewBox="0 0 174 210" fill="none">
                                        <path
                                            d="M168.636 86.8182C168.636 150.455 86.8182 205 86.8182 205C86.8182 205 5 150.455 5 86.8182C5 65.1187 13.6201 44.3079 28.964 28.964C44.3079 13.6201 65.1187 5 86.8182 5C108.518 5 129.328 13.6201 144.672 28.964C160.016 44.3079 168.636 65.1187 168.636 86.8182Z"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M86.8182 114.091C101.88 114.091 114.091 101.88 114.091 86.8182C114.091 71.7559 101.88 59.5455 86.8182 59.5455C71.7559 59.5455 59.5455 71.7559 59.5455 86.8182C59.5455 101.88 71.7559 114.091 86.8182 114.091Z"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact__form-wrap">
                            <h2 class="title">Leave Us A Message</h2>
                            <form method="POST" action="{{ route('challenges.update', $challenge->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-grp">
                                    <label for="Titre">Titre *</label>
                                    <input type="text" name="titre" value="{{ old('titre', $challenge->titre) }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Challenge Image</label>

                                    <!-- Custom file input -->
                                    <div class="custom-file">
                                        <input type="file" id="image" name="image" accept="image/*"
                                            class="custom-file-input" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="image">Choose an image...</label>
                                    </div>

                                    <!-- Image preview -->
                                    <div style="margin-top:10px;">
                                        <img id="imagePreview" src="#" alt="Preview"
                                            style="display:none; max-width: 200px; border:1px solid #ccc; padding:5px;">
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <label for="Description">Description *</label>
                                    <textarea name="description" required> {{ old('description', $challenge->description) }}</textarea>

                                </div>
                                <div class="form-grp">
                                    <label for="DateDEbut">Date de début *</label>
                                    <input id="dateDebut" name="dateDebut" type="date"
                                        value="{{ old('dateDebut', $challenge->dateDebut) }}" required>
                                </div>
                                <div class="form-grp">
                                    <label for="DateFin">Date de fin *</label>
                                    <input id="dateFin" name="dateFin" type="date"
                                        value="{{ old('dateFin', $challenge->dateFin) }}" required>
                                </div>

                                <button type="submit" class="tg-btn tg-btn-three black-btn">Submit Message</button>
                            </form>
                            <p class="ajax-response mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection

@push('frontoffice-scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);

                // Update file name
                input.nextElementSibling.innerText = input.files[0].name;
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                input.nextElementSibling.innerText = "Choose an image...";
            }
        }
    </script>
@endpush
