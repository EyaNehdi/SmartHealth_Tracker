<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Email Verification - SmartHealth Tracker</title>
    <meta name="description" content="Verify your email address - SmartHealth Tracker">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{Vite::asset('resources/assets/img/favicon.png')}}">

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
                <div class="loader-icon"><img src="{{Vite::asset('resources/assets/img/logo/preloader.svg')}}" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L1 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
    <!-- Scroll-top-end-->

    <!-- main-area -->
    <main class="main-area fix">

        <!-- verification-area -->
        <section class="login__area">
            <div class="container-fluid p-0">
                <div class="row gx-0">
                    <div class="col-md-6">
                        <div class="login__left-side" data-background="{{Vite::asset('resources/assets/img/slider/jj.jpg')}}">
                            <a href="{{ route('home') }}"><img src="{{Vite::asset('resources/assets/img/logo/logo.svg')}}" alt="logo"></a>
                            <div class="login__left-content">
                                <p>"SmartHealth Tracker helps me stay motivated and track my fitness journey with ease. The community support is amazing!"</p>
                                <h4 class="title">Sarah Johnson</h4>
                                <span>Fitness Enthusiast</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login__form-wrap">
                            <div class="text-center mb-4">
                                <div class="verification-icon mb-3">
                                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #22c55e;">
                                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h2 class="title">Verify Your Email</h2>
                                <p class="text-muted">We've sent a verification link to your email address</p>
                            </div>

                            <div class="verification-content">
                                <div class="alert alert-info mb-4">
                                    <div class="d-flex align-items-start">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 mt-1" style="color: #3b82f6;">
                                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div>
                                            <strong>Check your inbox!</strong><br>
                                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                        </div>
                                    </div>
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                    <div class="alert alert-success mb-4">
                                        <div class="d-flex align-items-start">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 mt-1" style="color: #22c55e;">
                                                <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div>
                                                <strong>Email sent!</strong><br>
                                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="verification-actions">
                                    <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                                        @csrf
                                        <button type="submit" class="tg-btn tg-btn-three black-btn w-100">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ __('Resend Verification Email') }}
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-secondary w-100">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                                <path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <polyline points="16,17 21,12 16,7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                </div>

                                <div class="verification-help mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2" style="color: #f59e0b;">
                                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                                    <path d="M9.09 9C9.3251 8.33167 9.78915 7.76811 10.4 7.40913C11.0108 7.05016 11.7289 6.91894 12.4272 7.03871C13.1255 7.15849 13.7588 7.52152 14.2151 8.06353C14.6713 8.60553 14.9211 9.29152 14.92 10C14.92 12 11.92 13 11.92 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 17H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Need Help?
                                            </h5>
                                            <p class="card-text mb-0">
                                                <strong>Can't find the email?</strong><br>
                                                Check your spam folder or try resending the verification email. If you continue to have issues, please contact our support team.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- verification-area-end -->

    </main>
    <!-- main-area-end -->

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

    <style>
        .verification-icon {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .verification-content {
            max-width: 500px;
            margin: 0 auto;
        }
        
        .verification-actions .btn {
            margin-bottom: 0.5rem;
        }
        
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem;
        }
        
        .alert-info {
            background-color: #e0f2fe;
            color: #0c4a6e;
        }
        
        .alert-success {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card-title {
            color: #f59e0b;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        
        .w-100 {
            width: 100% !important;
        }
        
        .me-2 {
            margin-right: 0.5rem !important;
        }
        
        .mt-1 {
            margin-top: 0.25rem !important;
        }
        
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        
        .mt-4 {
            margin-top: 1.5rem !important;
        }
        
        .text-muted {
            color: #6b7280 !important;
        }
        
        .text-center {
            text-align: center !important;
        }
        
        .d-flex {
            display: flex !important;
        }
        
        .align-items-start {
            align-items: flex-start !important;
        }
    </style>
</body>

</html>