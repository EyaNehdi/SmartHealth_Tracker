<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from themeadapt.com/tf/oxinex/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 21:11:27 GMT -->

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

    <!--Preloader-->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ Vite::asset('resources/assets/img/logo/preloader.svg') }}"
                        alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L1 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
   <x-app-layout>

    <!-- header-area-end -->



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
                        <h3>Notre objectifs</h3>
                        @foreach ($challenges as $challenge)
                            <div class="contact__info-wrap">

                                <div class="contact__info-item">
                                    <h4 class="title">{{ $challenge->titre }}</h4>
                                    <p>{{ $challenge->description }}</p>
                                    <ul class="list-wrap">
                                        <li>
                                            <a class="Date" href="#">{{ $challenge->dateDebut }} -
                                                {{ $challenge->dateFin }}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ $challenge->participations_count }} participants</a>
                                        </li>
                                        <li>
                                            <!-- Button to open modal -->
                                            <button type="button" class="tg-btn tg-btn-three" data-bs-toggle="modal"
                                                data-bs-target="#participantsModal{{ $challenge->id }}"
                                                style="border: 5px solid #000;"> <!-- black 5px border -->
                                                Details
                                            </button>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="participantsModal{{ $challenge->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Participants of {{ $challenge->titre }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($challenge->participations->count() > 0)
                                                <table class="table table-striped align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>Email</th>
                                                            <th>Comment</th>
                                                            <th>Reply</th>
                                                            <th>Image</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($challenge->participations as $participation)
<tr>
    <td>{{ $participation->user->name }}</td>
    <td>{{ $participation->user->email }}</td>
    <td>{{ $participation->comment ?? '-' }}</td>
    <td>
        <!-- Only show reply form if current user is the challenge owner -->
        @if(auth()->id() === $challenge->created_by)
            <form action="{{ route('participation.reply', $participation->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT because your route expects it -->
                <div class="input-group">
                    <input type="text" name="reply"
                           class="form-control form-control-sm"
                           placeholder="Write a reply..." required>
                    <button class="btn btn-primary btn-sm" type="submit">Send</button>
                </div>
            </form>
        @endif

        <!-- Display existing reply -->
        @if ($participation->reply)
            <small class="text-muted d-block mt-1">Reply: {{ $participation->reply }}</small>
        @endif
    </td>
    <td>
        @if ($participation->image)
            <img src="{{ asset('storage/' . $participation->image) }}" alt="Image" width="50">
        @else
            -
        @endif
    </td>
</tr>
@endforeach

                                                    </tbody>
                                                </table>
                                            @else
                                                <p>No participants yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-6">
                        <div class="contact__form-wrap">
                            <h2 class="title">ajouter un objectif</h2>
                            <form method="POST" action="{{ route('challenges.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-grp">
                                    <label for="Titre">Titre *</label>
                                    <input type="text" name="titre" required>
                                </div>
                                <div class="form-group">


                                    <!-- Custom file input -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Upload Image *</label>
                                        <input class="form-control form-control-lg" type="file" id="image"
                                            name="image" accept="image/*" onchange="previewImage(event)">
                                        <small class="text-muted">Accepted formats: JPG, PNG, JPEG. Max size:
                                            2MB</small>
                                        <div class="mt-2">
                                            <img id="preview" src="#" alt="Preview"
                                                style="display:none; max-width:200px; border-radius:10px;" />
                                        </div>
                                    </div>

                                    <!-- Image preview -->
                                    <div style="margin-top:10px;">
                                        <img id="imagePreview" src="#" alt="Preview"
                                            style="display:none; max-width: 200px; border:1px solid #ccc; padding:5px;">
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <label for="Description">Description *</label>
                                    <textarea name="description" required></textarea>

                                </div>
                                <div class="form-grp">
                                    <label for="DateDEbut">Date de début *</label>
                                    <input id="dateDebut" name="dateDebut" type="date" required>
                                </div>
                                <div class="form-grp">
                                    <label for="DateFin">Date de fin *</label>
                                    <input id="dateFin" name="dateFin" type="date" required>
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
    </x-app-layout>
    <!-- main-area-end -->

    <!-- footer-area -->

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
</body>


<!-- Mirrored from themeadapt.com/tf/oxinex/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 21:11:27 GMT -->

</html>
