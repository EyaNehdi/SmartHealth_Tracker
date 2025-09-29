<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from themeadapt.com/tf/oxinex/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 21:11:04 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Oxinex </title>
    <meta name="description" content="Oxinex - Health Supplement HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{Vite::asset('resources/assets/img/favicon.png')}}">
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


    <!--Preloader-end -->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{Vite::asset('resources/assets/img/logo/preloader.svg')}}" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L1 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->

    <x-app-layout>

    <!-- header-area-end -->



    <!-- main-area -->
    <main class="main-area fix">

        <!-- slider-area -->
        <section class="slider__area">
            <div class="tg__slider-active swiper-container" id="bannerSlider" data-swiper-options='{
                "loop": true,
                "effect": "fade",
                "autoplay": { "delay": 8000 },
                "breakpoints": {
                    "0": {
                        "spaceBetween": 0,
                        "slidesPerView": 1
                    },
                    "375": {
                        "spaceBetween": 0,
                        "slidesPerView": 1
                    },
                    "575": {
                        "spaceBetween": 0,
                        "slidesPerView": 1
                    },
                    "768": {
                        "spaceBetween": 0,
                        "slidesPerView": 1
                    },
                    "992": {
                        "spaceBetween": 0,
                        "slidesPerView": 1
                    },
                    "1400": {
                        "spaceBetween": 0,
                        "slidesPerView": 1
                    }
                }}'>

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slider__bg" data-background="{{Vite::asset('resources/assets/img/slider/slider_bg01.jpg')}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="slider__content">
                                            <span class="sub-title">EFFECTIVE SUPPLEMENT FOR STRENGTH</span>
                                            <h2 class="title">TOP SUPPLEMENTS FOR STRENGTH AND HEALTH</h2>
                                            <a href="shop.html" class="tg-btn">Shop Now
                                                <span>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider__video-wrap">
                                <div class="thumb">
                                    <img src="{{Vite::asset('resources/assets/img/product/product_img04.png')}}" alt="img">
                                </div>
                                <div class="content">
                                    <a href="https://www.youtube.com/watch?v=7vbVft0M84o" class="popup-video">Watch
                                        <span>
                                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 0.875977L16.5556 10.876L1 20.876V0.875977Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                    <p>contact <br> WITH Oxinex</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider__bg" data-background="{{Vite::asset('resources/assets/img/slider/slider_bg02.jpg')}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="slider__content">
                                            <span class="sub-title">Increased Energy With Oxinex</span>
                                            <h2 class="title">Mix Protein Provided Way To Growth</h2>
                                            <a href="shop.html" class="tg-btn">Shop Now
                                                <span>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider__video-wrap">
                                <div class="thumb">
                                    <img src="{{Vite::asset('resources/assets/img/product/product_img02.png')}}" alt="img">
                                </div>
                                <div class="content">
                                    <a href="https://www.youtube.com/watch?v=7vbVft0M84o" class="popup-video">Watch
                                        <span>
                                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 0.875977L16.5556 10.876L1 20.876V0.875977Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                    <p>contact <br> WITH Oxinex</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider__social-wrap">
                <h6 class="title">Follow</h6>
                <ul class="list-wrap slider__social">
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 0C4.02948 0 0 4.02948 0 9C0 13.2206 2.90592 16.7623 6.82596 17.735V11.7504H4.97016V9H6.82596V7.81488C6.82596 4.75164 8.21232 3.3318 11.2198 3.3318C11.79 3.3318 12.7739 3.44376 13.1764 3.55536V6.04836C12.964 6.02604 12.595 6.01488 12.1367 6.01488C10.661 6.01488 10.0908 6.57396 10.0908 8.02728V9H13.0306L12.5255 11.7504H10.0908V17.9341C14.5472 17.3959 18.0004 13.6015 18.0004 9C18 4.02948 13.9705 0 9 0Z" fill="currentColor" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7447 1.42792H16.2748L10.7473 7.74554L17.25 16.3424H12.1584L8.17053 11.1284L3.60746 16.3424H1.07582L6.98808 9.58499L0.75 1.42792H5.97083L9.57555 6.19367L13.7447 1.42792ZM12.8567 14.828H14.2587L5.20905 2.86277H3.7046L12.8567 14.828Z" fill="currentColor" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1.6207C11.4047 1.6207 11.6895 1.63125 12.6352 1.67344C13.5141 1.71211 13.9887 1.85977 14.3051 1.98281C14.7234 2.14453 15.0258 2.34141 15.3387 2.6543C15.6551 2.9707 15.8484 3.26953 16.0102 3.68789C16.1332 4.0043 16.2809 4.48242 16.3195 5.35781C16.3617 6.30703 16.3723 6.5918 16.3723 8.99297C16.3723 11.3977 16.3617 11.6824 16.3195 12.6281C16.2809 13.507 16.1332 13.9816 16.0102 14.298C15.8484 14.7164 15.6516 15.0187 15.3387 15.3316C15.0223 15.648 14.7234 15.8414 14.3051 16.0031C13.9887 16.1262 13.5105 16.2738 12.6352 16.3125C11.6859 16.3547 11.4012 16.3652 9 16.3652C6.59531 16.3652 6.31055 16.3547 5.36484 16.3125C4.48594 16.2738 4.01133 16.1262 3.69492 16.0031C3.27656 15.8414 2.97422 15.6445 2.66133 15.3316C2.34492 15.0152 2.15156 14.7164 1.98984 14.298C1.8668 13.9816 1.71914 13.5035 1.68047 12.6281C1.63828 11.6789 1.62773 11.3941 1.62773 8.99297C1.62773 6.58828 1.63828 6.30351 1.68047 5.35781C1.71914 4.47891 1.8668 4.0043 1.98984 3.68789C2.15156 3.26953 2.34844 2.96719 2.66133 2.6543C2.97773 2.33789 3.27656 2.14453 3.69492 1.98281C4.01133 1.85977 4.48945 1.71211 5.36484 1.67344C6.31055 1.63125 6.59531 1.6207 9 1.6207ZM9 0C6.55664 0 6.25078 0.0105469 5.29102 0.0527344C4.33477 0.0949219 3.67734 0.249609 3.10781 0.471094C2.51367 0.703125 2.01094 1.00898 1.51172 1.51172C1.00898 2.01094 0.703125 2.51367 0.471094 3.1043C0.249609 3.67734 0.0949219 4.33125 0.0527344 5.2875C0.0105469 6.25078 0 6.55664 0 9C0 11.4434 0.0105469 11.7492 0.0527344 12.709C0.0949219 13.6652 0.249609 14.3227 0.471094 14.8922C0.703125 15.4863 1.00898 15.9891 1.51172 16.4883C2.01094 16.9875 2.51367 17.2969 3.1043 17.5254C3.67734 17.7469 4.33125 17.9016 5.2875 17.9437C6.24727 17.9859 6.55312 17.9965 8.99648 17.9965C11.4398 17.9965 11.7457 17.9859 12.7055 17.9437C13.6617 17.9016 14.3191 17.7469 14.8887 17.5254C15.4793 17.2969 15.982 16.9875 16.4813 16.4883C16.9805 15.9891 17.2898 15.4863 17.5184 14.8957C17.7398 14.3227 17.8945 13.6687 17.9367 12.7125C17.9789 11.7527 17.9895 11.4469 17.9895 9.00352C17.9895 6.56016 17.9789 6.2543 17.9367 5.29453C17.8945 4.33828 17.7398 3.68086 17.5184 3.11133C17.2969 2.51367 16.991 2.01094 16.4883 1.51172C15.9891 1.0125 15.4863 0.703125 14.8957 0.474609C14.3227 0.253125 13.6688 0.0984375 12.7125 0.05625C11.7492 0.0105469 11.4434 0 9 0Z" fill="currentColor" />
                                <path d="M9 4.37695C6.44766 4.37695 4.37695 6.44766 4.37695 9C4.37695 11.5523 6.44766 13.623 9 13.623C11.5523 13.623 13.623 11.5523 13.623 9C13.623 6.44766 11.5523 4.37695 9 4.37695ZM9 11.9988C7.34414 11.9988 6.00117 10.6559 6.00117 9C6.00117 7.34414 7.34414 6.00117 9 6.00117C10.6559 6.00117 11.9988 7.34414 11.9988 9C11.9988 10.6559 10.6559 11.9988 9 11.9988Z" fill="currentColor" />
                                <path d="M14.8852 4.19411C14.8852 4.79176 14.4 5.2734 13.8059 5.2734C13.2082 5.2734 12.7266 4.78825 12.7266 4.19411C12.7266 3.59645 13.2117 3.11481 13.8059 3.11481C14.4 3.11481 14.8852 3.59996 14.8852 4.19411Z" fill="currentColor" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0C4.03145 0 0 4.03145 0 9C0 13.9686 4.03145 18 9 18C13.9588 18 18 13.9686 18 9C18 4.03145 13.9588 0 9 0ZM14.9447 4.14859C16.0184 5.45662 16.6627 7.12581 16.6822 8.93166C16.4284 8.88289 13.8904 8.3655 11.333 8.68764C11.2744 8.56074 11.2256 8.42406 11.167 8.28743C11.0108 7.91651 10.8352 7.53581 10.6594 7.17463C13.4902 6.0228 14.7787 4.36334 14.9447 4.14859ZM9 1.32755C10.9523 1.32755 12.7386 2.05966 14.0955 3.26031C13.9588 3.45553 12.7972 5.00759 10.064 6.03253C8.80476 3.71909 7.40891 1.82538 7.19415 1.53254C7.77004 1.39588 8.37529 1.32755 9 1.32755ZM5.72996 2.04989C5.93494 2.32321 7.30153 4.22668 8.58026 6.49131C4.98807 7.44795 1.81562 7.42843 1.47397 7.42843C1.9718 5.04664 3.58243 3.06507 5.72996 2.04989ZM1.30803 9.00979C1.30803 8.93166 1.30803 8.85358 1.30803 8.77551C1.63991 8.78524 5.36876 8.83406 9.20498 7.68223C9.42953 8.1117 9.6345 8.55096 9.82974 8.99021C9.73209 9.01952 9.62471 9.04882 9.52712 9.07807C5.56399 10.3568 3.45553 13.8514 3.27983 14.1442C2.05965 12.7874 1.30803 10.9816 1.30803 9.00979ZM9 16.692C7.2234 16.692 5.58352 16.0868 4.28525 15.0716C4.42191 14.7885 5.98371 11.782 10.3178 10.269C10.3373 10.2592 10.3471 10.2592 10.3666 10.2495C11.4501 13.051 11.8894 15.4034 12.0065 16.077C11.0792 16.4772 10.064 16.692 9 16.692ZM13.2852 15.3742C13.2072 14.9056 12.7972 12.6605 11.7917 9.89803C14.2028 9.51733 16.3113 10.1421 16.5749 10.23C16.243 12.3677 15.013 14.2126 13.2852 15.3742Z" fill="currentColor" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="section__shape" data-background="{{Vite::asset('resources/assets/img/slider/slider_shape.svg')}}"></div>
        </section>
        <!-- slider-area-end -->

        <!-- brand-area -->
        <div class="brand__area">
            <div class="container">
                <div class="brand__active swiper-container fix" id="brandSlider" data-swiper-options='{
                    "loop": true,
                    "autoplay": { "delay": 2000 },
                    "breakpoints": {
                        "0": {
                            "spaceBetween": 0,
                            "slidesPerView": 1
                        },
                        "375": {
                            "spaceBetween": 20,
                            "slidesPerView": 2
                        },
                        "575": {
                            "spaceBetween": 20,
                            "slidesPerView": 3
                        },
                        "768": {
                            "spaceBetween": 20,
                            "slidesPerView": 4
                        },
                        "992": {
                            "spaceBetween": 20,
                            "slidesPerView": 6
                        },
                        "1400": {
                            "spaceBetween": 20,
                            "slidesPerView": 6
                        }
                    }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_01.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_02.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_03.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_04.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_05.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_06.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item">
                                <img src="{{Vite::asset('resources/assets/img/brand/brand_03.png')}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- feature-area -->
        <section id="features" class="features__area section-pt-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb-50" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <span class="sub-title">TRUSTED SINCE 1980</span>
                            <h2 class="title">Awesome oxinex Features</h2>
                        </div>
                    </div>
                </div>
                <div class="features__item-wrap">
                    <div class="row gutter-20 gutter-y-24">
                        <div class="col-lg-3 col-sm-6">
                            <div class="features__item" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                                <div class="features__icon">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M44.0455 6.30382L43.4382 4.56465C42.486 1.83759 39.9055 0.00537109 37.017 0.00537109H30.07L25.6493 4.426V8.28738C25.6493 11.5577 28.3098 14.2182 31.58 14.2182H34.292C35.3702 18.9509 35.4917 23.9985 34.6602 28.816C34.4425 28.5947 34.2164 28.3804 33.9813 28.1742C31.5266 26.0222 28.3876 24.8848 24.9032 24.8848C24.7048 24.8848 24.5071 24.8899 24.31 24.8974C23.666 22.5195 22.3145 20.3685 20.4241 18.7467C18.1883 16.8284 15.3324 15.772 12.383 15.772C6.06364 15.772 0.837125 20.5417 0.11355 26.6697H0V28.127C0 33.9634 2.27178 39.4514 6.39687 43.5801C10.522 47.709 16.008 49.9856 21.8443 49.9908L25.9639 49.9945H26.0013C32.9319 49.9944 39.8159 48.2501 45.91 44.949L49.9831 42.7427C49.9831 42.7428 50.622 22.2521 44.0455 6.30382ZM47.0745 41.0036L44.5217 42.3863C38.8522 45.4573 32.4491 47.08 26.0013 47.08C25.9897 47.08 25.9779 47.08 25.9665 47.08L21.847 47.0763C16.7887 47.0717 12.0339 45.0986 8.45873 41.5203C5.13054 38.1891 3.19443 33.8372 2.94273 29.1711V28.1271C2.94273 22.9215 7.17766 18.6867 12.383 18.6867C14.6368 18.6867 16.8185 19.4937 18.5263 20.9588C19.8735 22.1146 20.8612 23.621 21.3877 25.2904C18.3425 26.0053 15.6589 27.637 13.8583 29.9496L16.1579 31.7404C18.0793 29.2727 21.3485 27.7996 24.9031 27.7996C27.6699 27.7996 30.1447 28.6871 32.0598 30.3661C33.8566 31.9413 34.9992 34.1056 35.2774 36.4604L38.1719 36.1185C38.003 34.6881 37.5897 33.3121 36.9602 32.0428C38.5053 25.8013 38.4698 19.0584 36.9198 12.8238V10.1787C36.9198 7.61438 34.8097 5.52821 32.2454 5.52821H31.8556V8.44252H32.2454C33.2025 8.44252 33.9813 9.22126 33.9813 10.1784V11.3036H31.58C29.9169 11.3036 28.5639 9.9506 28.5639 8.28738V5.63326L31.2772 2.91998H37.017C38.6677 2.91998 40.1424 3.96702 40.6866 5.52547L41.2938 7.26455C45.109 18.1911 47.0539 29.6552 47.0744 40.9881C47.0745 40.9932 47.0745 40.9984 47.0745 41.0036Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="features__content">
                                    <h2 class="title">Increased Energy</h2>
                                    <p>A thing added to something else in order to complete or enhance it. A dietary supplement</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="features__item" data-sal="slide-up" data-sal-duration="800" data-sal-delay="200">
                                <div class="features__icon">
                                    <svg width="64" height="40" viewBox="0 0 64 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M60.25 13.75H59V8.125C59 5.36768 56.7563 3.125 54 3.125C53.0361 3.125 52.1348 3.39893 51.3711 3.87354C50.8599 1.65625 48.8687 0 46.5 0H46.4985C43.7427 0 41.4985 2.24268 41.4985 5V13.75H22.5015V5C22.5015 2.24268 20.2573 0 17.5 0C15.1313 0 13.1401 1.65625 12.6289 3.87354C11.8652 3.39893 10.9639 3.125 10 3.125C7.24365 3.125 5 5.36768 5 8.125V13.75H3.75C1.68262 13.75 0 15.4326 0 17.5V22.5C0 24.5674 1.68262 26.25 3.75 26.25H5V31.875C5 34.6323 7.24365 36.875 10 36.875C10.9639 36.875 11.8652 36.6011 12.6289 36.1265C13.1401 38.3438 15.1313 40 17.5 40H17.5015C20.2573 40 22.5015 37.7573 22.5015 35V26.25H41.4985V35C41.4985 37.7573 43.7427 40 46.5 40C48.8687 40 50.8599 38.3438 51.3711 36.1265C52.1348 36.6011 53.0361 36.875 54 36.875C56.7563 36.875 59 34.6323 59 31.875V26.25H60.25C62.3174 26.25 64 24.5674 64 22.5V17.5C64 15.4326 62.3174 13.75 60.25 13.75ZM5 23.75H3.75C3.06104 23.75 2.5 23.189 2.5 22.5V17.5C2.5 16.811 3.06104 16.25 3.75 16.25H5V23.75ZM12.5 31.875C12.5 32.5649 12.2202 33.1899 11.7676 33.6426C11.3149 34.0952 10.6899 34.375 10 34.375C8.62109 34.375 7.5 33.2539 7.5 31.875V8.125C7.5 6.74609 8.62109 5.625 10 5.625C11.3789 5.625 12.5 6.74609 12.5 8.125V31.875ZM20.0015 35C20.0015 36.3789 18.8789 37.5 17.5015 37.5H17.5C16.1226 37.5 15 36.3789 15 35V5C15 3.62109 16.1226 2.5 17.5015 2.5C18.8789 2.5 20.0015 3.62109 20.0015 5V35ZM41.4912 18.75H32.75C32.0601 18.75 31.5 19.3101 31.5 20C31.5 20.6899 32.0601 21.25 32.75 21.25H41.4912V23.75H22.4951V16.25H41.4912V18.75ZM49 35C49 36.3789 47.8774 37.5 46.4985 37.5C45.1211 37.5 43.9985 36.3789 43.9985 35V20.064C43.9976 20.0913 43.9951 20.1187 43.9912 20.145V19.855C43.9951 19.8813 43.9976 19.9087 43.9985 19.936V5C43.9985 3.62109 45.1211 2.5 46.4985 2.5H46.5C47.8774 2.5 49 3.62109 49 5V35ZM56.5 31.875C56.5 33.2539 55.3789 34.375 54 34.375C52.6211 34.375 51.5 33.2539 51.5 31.875V8.125C51.5 6.74609 52.6211 5.625 54 5.625C55.3789 5.625 56.5 6.74609 56.5 8.125V31.875ZM61.5 22.5C61.5 23.189 60.939 23.75 60.25 23.75H59V16.25H60.25C60.939 16.25 61.5 16.811 61.5 17.5V22.5Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="features__content">
                                    <h2 class="title">bone builder</h2>
                                    <p>A thing added to something else in order to complete or enhance it. A dietary supplement</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="features__item" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                                <div class="features__icon">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M25.0488 41.2109C26.1275 41.2109 27.002 40.3365 27.002 39.2578C27.002 38.1791 26.1275 37.3047 25.0488 37.3047C23.9701 37.3047 23.0957 38.1791 23.0957 39.2578C23.0957 40.3365 23.9701 41.2109 25.0488 41.2109Z" fill="currentColor" />
                                        <path d="M33.3496 0C33.3496 4.57705 29.6259 8.30078 25.0488 8.30078C20.4718 8.30078 16.748 4.57705 16.748 0H13.8184C13.8184 6.19248 18.8563 11.2305 25.0488 11.2305C31.2413 11.2305 36.2793 6.19248 36.2793 0H33.3496Z" fill="currentColor" />
                                        <path d="M41.9517 25.9646L42.4674 18.2015C45.2222 16.234 47.0215 13.0107 47.0215 9.375C47.0215 6.5125 46.142 3.76816 44.4782 1.43867L43.4506 0H39.8502L42.0942 3.1415C43.4011 4.97119 44.0918 7.12666 44.0918 9.375C44.0918 13.7367 40.5433 17.2852 36.1816 17.2852H13.8184C9.45674 17.2852 5.9082 13.7367 5.9082 9.375C5.9082 7.12666 6.59893 4.97119 7.90576 3.1416L10.1498 0H6.54941L5.52178 1.43867C3.85801 3.76816 2.97852 6.5125 2.97852 9.375C2.97852 13.0555 4.82266 16.3128 7.63506 18.273L8.14609 25.9645C8.58281 32.5378 7.19189 39.0937 4.12373 44.9231L3.3498 46.3936L4.90566 46.977C5.23477 47.1005 13.1042 50 25.0488 50C36.9935 50 44.8629 47.1005 45.1921 46.9771L46.748 46.3937L45.974 44.9232C42.9059 39.0937 41.5149 32.5379 41.9517 25.9646ZM25.0488 47.0703C16.6585 47.0703 10.2884 45.5428 7.49199 44.7296C10.2688 38.8222 11.5034 32.3039 11.0693 25.7702L10.6691 19.7478C11.6662 20.0511 12.7234 20.2148 13.8184 20.2148H36.1816C37.3131 20.2148 38.4044 20.0403 39.4306 19.7173L39.0284 25.7703C38.5942 32.3049 39.829 38.8233 42.6065 44.7313C39.8171 45.545 33.4645 47.0703 25.0488 47.0703Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="features__content">
                                    <h2 class="title">weight loss</h2>
                                    <p>A thing added to something else in order to complete or enhance it. A dietary supplement</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="features__item" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                                <div class="features__icon">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M28.5384 16.1289H22.8417L18.9707 25.8064H23.9167L22.2747 31.2781C22.0901 31.8943 22.2046 32.5426 22.5884 33.0588C22.9715 33.5749 23.561 33.8709 24.2038 33.8709C25.011 33.8709 25.7368 33.3919 26.0546 32.6499L31.0618 20.9676H26.9255L28.5384 16.1289ZM28.6151 22.5806L24.5723 32.0152C24.5094 32.1628 24.3642 32.2579 24.2037 32.2579C24.0279 32.2579 23.9263 32.1563 23.8819 32.0967C23.8368 32.0362 23.769 31.9096 23.8199 31.7418L26.0836 24.1935H21.3521L23.9328 17.7418H26.3005L24.6876 22.5806H28.6151Z" fill="currentColor" />
                                        <path d="M47.5807 37.0968H46.7743V36.2904C46.7743 34.9565 45.6888 33.8711 44.3549 33.8711H41.9356V33.0646C41.9356 32.0146 41.259 31.1276 40.3227 30.7937V17.1339C40.3227 13.471 38.1977 10.2283 34.9856 8.71215C35.2936 8.30651 35.484 7.8057 35.484 7.25814V2.41933C35.4839 1.08551 34.3984 0 33.0646 0H16.9355C15.6016 0 14.5162 1.08551 14.5162 2.41933V7.25806C14.5162 7.80562 14.7066 8.30643 15.0146 8.71206C11.8025 10.2282 9.67747 13.4718 9.67747 17.1338V30.7935C8.74117 31.1274 8.06456 32.0145 8.06456 33.0645V33.8709H5.64515C4.31124 33.8709 3.22582 34.9564 3.22582 36.2902V37.0966H2.41941C1.08551 37.0968 0 38.1823 0 39.5161V41.129C0 42.4629 1.08551 43.5484 2.41933 43.5484H3.22574V44.3548C3.22574 45.6887 4.31124 46.7741 5.64506 46.7741H8.06439V47.5805C8.06439 48.9144 9.14989 49.9998 10.4837 49.9998H13.7095C15.0434 49.9998 16.1289 48.9143 16.1289 47.5805V43.5483H33.8708V47.5805C33.8708 48.9144 34.9563 49.9998 36.2901 49.9998H39.516C40.8499 49.9998 41.9353 48.9143 41.9353 47.5805V46.7741H44.3546C45.6885 46.7741 46.7739 45.6886 46.7739 44.3548V43.5484H47.5803C48.9142 43.5484 49.9997 42.4629 49.9997 41.129V39.5161C50 38.1823 48.9146 37.0968 47.5807 37.0968ZM16.9355 8.06456C16.4903 8.06456 16.1291 7.70325 16.1291 7.25814V4.83873H17.742V8.06456H16.9355ZM19.3549 4.83873H20.9678V8.06456H19.3549V4.83873ZM22.5807 4.83873H24.1936V8.06456H22.5807V4.83873ZM25.8065 4.83873H27.4194V8.06456H25.8065V4.83873ZM29.0322 4.83873H30.6451V8.06456H29.0322V4.83873ZM32.2581 4.83873H33.871V7.25806C33.871 7.70325 33.5097 8.06447 33.0646 8.06447H32.2581V4.83873H32.2581ZM16.9355 1.61291H33.0646C33.5098 1.61291 33.871 1.97422 33.871 2.41933V3.22574H16.129V2.41933C16.129 1.97422 16.4903 1.61291 16.9355 1.61291ZM17.0484 9.67738H32.9516C36.3452 10.5669 38.7097 13.6177 38.7097 17.1338V30.6451H37.0968V17.1338C37.0968 14.4741 35.3968 12.1419 32.8662 11.329L17.3807 11.2903L17.1339 11.329C14.6033 12.142 12.9033 14.4742 12.9033 17.1338V30.6451H11.2904V17.1338C11.2903 13.6178 13.6548 10.5669 17.0484 9.67738ZM33.871 33.0646V37.0968H16.129V33.0646C16.129 32.0145 15.4524 31.1275 14.5161 30.7936V17.1339C14.5161 15.2186 15.7145 13.5331 17.5121 12.9033H32.4879C34.2855 13.5331 35.4839 15.2186 35.4839 17.1339V30.7936C34.5476 31.1275 33.871 32.0145 33.871 33.0646ZM2.41933 41.9355C1.97413 41.9355 1.61291 41.5742 1.61291 41.1291V39.5161C1.61291 39.0709 1.97422 38.7097 2.41933 38.7097H3.22574V41.9355H2.41933ZM5.64515 45.1614C5.19996 45.1614 4.83873 44.8 4.83873 44.3549V36.2904C4.83873 35.8452 5.20004 35.484 5.64515 35.484H8.06447V45.1614H5.64515ZM14.5161 47.5807C14.5161 48.0259 14.1548 48.3871 13.7097 48.3871H10.4839C10.0387 48.3871 9.67747 48.0258 9.67747 47.5807V33.0646C9.67747 32.6194 10.0388 32.2581 10.4839 32.2581H13.7097C14.1549 32.2581 14.5161 32.6194 14.5161 33.0646V47.5807ZM16.129 41.9355V38.7097H33.871V41.9355H16.129ZM40.3226 47.5807C40.3226 48.0259 39.9613 48.3871 39.5162 48.3871H36.2904C35.8452 48.3871 35.484 48.0258 35.484 47.5807V33.0646C35.484 32.6194 35.8453 32.2581 36.2904 32.2581H39.5162C39.9614 32.2581 40.3226 32.6194 40.3226 33.0646V47.5807ZM45.1614 44.3549C45.1614 44.8 44.8 45.1613 44.3549 45.1613H41.9356V35.4839H44.3549C44.8001 35.4839 45.1614 35.8452 45.1614 36.2903V44.3549ZM48.3871 41.129C48.3871 41.5742 48.0258 41.9354 47.5807 41.9354H46.7743V38.7096H47.5807C48.0259 38.7096 48.3871 39.0709 48.3871 39.516V41.129Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="features__content">
                                    <h2 class="title">stress relaxed</h2>
                                    <p>A thing added to something else in order to complete or enhance it. A dietary supplement</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="features__bg" data-background="{{Vite::asset('resources/assets/img/bg/features_bg.jpg')}}"></div>
                </div>
            </div>
            <div class="features__shape">
                <img src="{{Vite::asset('resources/assets/img/images/features_shape01.png')}}" alt="shape" data-sal="zoom-in" data-sal-duration="700" data-sal-delay="100">
            </div>
        </section>
        <!-- feature-area-end -->

        <!-- about-area -->
        <section id="ingredient" class="about__area section-pt-150 section-pb-120">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-10 order-0 order-lg-2">
                        <div class="about__img">
                            <img src="{{Vite::asset('resources/assets/img/images/about_img.jpg')}}" alt="img">
                            <img src="{{Vite::asset('resources/assets/img/images/about_shape.jpg')}}" alt="shape" class="shape">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <div class="section__title mb-30">
                                <span class="sub-title">TRUSTED SINCE 1980</span>
                                <h2 class="title">Power-Packed Ingredients for Peak Performance</h2>
                            </div>
                            <p>Vitamin D3 supplements are commonly recommended for people at risk for vitamin D deficiency. Low vitamin D levels cause depression, fatigue, and muscle weakness. Over time, vitamin D deficiency.</p>
                            <ul class="list-wrap about__list">
                                <li>
                                    <div class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                            <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    Clinically backed ingredient
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                            <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    Visible Results, Fast
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                            <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    Money-Back guarantee
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="currentColor" />
                                            <path d="M14.5451 7.27344L8.9201 13.0488L6.36328 10.4237" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    Trusted by thousands
                                </li>
                            </ul>
                            <div class="about__btn">
                                <a href="shop.html" class="tg-btn red-btn">Shop Now
                                    <span>
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                            <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="shop.html" class="tg-btn border-btn">Contact Now
                                    <span>
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                            <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about__shape">
                <img src="{{Vite::asset('resources/assets/img/images/about_shape.png')}}" alt="shape" data-sal="slide-right" data-sal-duration="700" data-sal-delay="100">
            </div>
        </section>
        <!-- about-area-end -->

        <!-- counter-area -->
        <section class="counter__area section-pb-150">
            <div class="container">
                <div class="row gutter-y-30 gutter-20 justify-content-center">
                    <div class="col-lg-4 col-6">
                        <div class="counter__item">
                            <div class="counter__icon">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.9932 21.9885C32.9783 21.9886 35.0351 22.9597 36.1416 24.8499C37.0366 26.3791 37.0391 28.1047 37.0391 29.1536V34.3752H46.1904C46.9987 34.3754 47.7896 34.6093 48.4678 35.0491C49.1461 35.489 49.6829 36.1166 50.0127 36.8547C50.3424 37.5928 50.4519 38.4106 50.3271 39.2092C50.2023 40.0079 49.8487 40.7534 49.3096 41.3557L49.249 41.4221L49.3096 41.4895C50.0236 42.2861 50.4052 43.3264 50.376 44.3958C50.3485 45.3983 49.9617 46.3551 49.29 47.094L49.1523 47.2385C49.0306 47.3594 48.9018 47.4729 48.7666 47.5784L48.6943 47.635L48.7441 47.7122C49.269 48.5159 49.5016 49.4761 49.4023 50.4309C49.303 51.3856 48.8781 52.2768 48.1992 52.9553C48.0777 53.076 47.9495 53.1898 47.8145 53.2952L47.7412 53.3518L47.792 53.429C48.2041 54.0604 48.438 54.7917 48.4688 55.5452C48.4995 56.2985 48.326 57.0463 47.9668 57.7092C47.6075 58.3723 47.0749 58.9262 46.4268 59.3118C45.7787 59.6972 45.0382 59.9002 44.2842 59.8997H25.2285C24.3372 59.9003 23.461 59.6677 22.6875 59.2249L22.6035 59.177L22.5527 59.26C22.4347 59.4552 22.268 59.6167 22.0693 59.7288C21.8706 59.8408 21.6461 59.8996 21.418 59.8997H11.8896C11.5373 59.8995 11.1993 59.7601 10.9502 59.511C10.7009 59.2617 10.5605 58.9231 10.5605 58.5706V35.7043C10.5605 35.3518 10.7009 35.0132 10.9502 34.7639C11.1993 34.5149 11.5374 34.3754 11.8896 34.3752H21.418C21.7703 34.3753 22.1082 34.5149 22.3574 34.7639C22.6067 35.0132 22.7471 35.3518 22.7471 35.7043V37.0598L22.9014 36.9592L26.0596 34.8958L26.0781 34.884L26.0898 34.8645L28.6484 30.7073L28.6641 30.6829V23.3176C28.6642 22.9653 28.8037 22.6273 29.0527 22.3782C29.302 22.1289 29.6406 21.9885 29.9932 21.9885ZM13.2197 57.2415H20.0889V37.0334H13.2197V57.2415ZM31.3223 31.0598C31.3224 31.3058 31.2538 31.5475 31.125 31.7571L28.5771 35.8977L28.5664 35.9133L28.5635 35.9319C28.5312 36.1113 28.4626 36.2825 28.3623 36.4348C28.287 36.5491 28.1954 36.6513 28.0898 36.7375L27.9805 36.8176L22.792 40.2053L22.7471 40.2356V54.76C22.7479 55.4179 23.0094 56.0487 23.4746 56.5139C23.9398 56.9791 24.5707 57.2406 25.2285 57.2415H44.2842C44.4855 57.2418 44.6851 57.2024 44.8711 57.1252C45.057 57.0481 45.2262 56.9349 45.3682 56.7922C45.5815 56.5783 45.7265 56.3054 45.7852 56.009C45.8438 55.7126 45.8131 55.4053 45.6973 55.1262C45.5813 54.847 45.3852 54.6085 45.1338 54.4407C44.8823 54.2729 44.5865 54.1837 44.2842 54.1838H43.332C42.9795 54.1838 42.6409 54.0435 42.3916 53.7942C42.1424 53.5449 42.0029 53.2062 42.0029 52.8538C42.0031 52.5015 42.1425 52.1634 42.3916 51.9143C42.6409 51.665 42.9795 51.5247 43.332 51.5247H45.2373C45.6427 51.5247 46.0316 51.364 46.3184 51.0774C46.605 50.7907 46.7665 50.4017 46.7666 49.9963C46.7666 49.5908 46.6051 49.2011 46.3184 48.9143C46.0316 48.6277 45.6427 48.467 45.2373 48.467H43.332C42.9795 48.467 42.6409 48.3267 42.3916 48.0774C42.1425 47.8282 42.003 47.4902 42.0029 47.1379C42.0029 46.7855 42.1424 46.4468 42.3916 46.1975C42.6409 45.9482 42.9795 45.8088 43.332 45.8088H46.1904C46.5959 45.8088 46.9848 45.6473 47.2715 45.3606C47.5582 45.0739 47.7196 44.685 47.7197 44.2795C47.7197 43.874 47.5583 43.4843 47.2715 43.1975C46.9848 42.9109 46.5958 42.7503 46.1904 42.7502H43.332C42.9795 42.7502 42.6409 42.6099 42.3916 42.3606C42.1425 42.1114 42.003 41.7735 42.0029 41.4211C42.0029 41.0686 42.1423 40.73 42.3916 40.4807C42.6409 40.2314 42.9795 40.092 43.332 40.092H46.1904C46.5959 40.092 46.9848 39.9305 47.2715 39.6438C47.5582 39.3571 47.7197 38.9682 47.7197 38.5627C47.7197 38.1573 47.5581 37.7684 47.2715 37.4817C46.9848 37.195 46.5959 37.0335 46.1904 37.0334H35.71C35.3574 37.0334 35.0188 36.8931 34.7695 36.6438C34.5204 36.3946 34.3809 36.0567 34.3809 35.7043V29.1536C34.3808 28.1135 34.3213 27.1276 33.9219 26.345C33.5173 25.5523 32.7716 24.9829 31.4385 24.7561L31.3223 24.7356V31.0598Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                    <path d="M16.6533 53.5493C17.3872 53.5493 17.9832 54.1445 17.9834 54.8784C17.9834 55.6125 17.3874 56.2085 16.6533 56.2085C15.9195 56.2082 15.3242 55.6123 15.3242 54.8784C15.3245 54.1447 15.9196 53.5496 16.6533 53.5493Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                    <path d="M29.9922 0.0996094C30.2401 0.0996654 30.4828 0.169891 30.6934 0.300781C30.9039 0.431684 31.0738 0.618499 31.1836 0.84082L33.459 5.45117L33.4824 5.49805L33.5342 5.50586L38.623 6.24512C38.8684 6.28083 39.0985 6.3851 39.2881 6.54492C39.4777 6.70479 39.6187 6.91453 39.6953 7.15039C39.7719 7.3861 39.781 7.63829 39.7217 7.87891C39.6622 8.11968 39.537 8.33958 39.3594 8.5127L35.6777 12.1016L35.6396 12.1377L35.6484 12.1895L36.5176 17.2578L36.5186 17.2607C36.625 17.7779 36.3787 18.2594 35.9814 18.5479C35.5843 18.8361 35.0508 18.9208 34.5928 18.6602L34.5898 18.6582L30.0381 16.2666L29.9922 16.2412L29.9453 16.2666L25.3945 18.6582C25.175 18.7736 24.9271 18.8255 24.6797 18.8076C24.4324 18.7897 24.1947 18.7033 23.9941 18.5576C23.7936 18.4119 23.6374 18.213 23.5439 17.9834C23.4505 17.7537 23.4239 17.5022 23.4658 17.2578L24.335 12.1895L24.3438 12.1377L24.3066 12.1016L20.624 8.5127C20.4465 8.3396 20.3211 8.11963 20.2617 7.87891C20.2024 7.63835 20.2116 7.38604 20.2881 7.15039C20.3647 6.91462 20.5058 6.70476 20.6953 6.54492C20.8849 6.38506 21.1159 6.2808 21.3613 6.24512L26.4492 5.50586L26.501 5.49805L26.5244 5.45117L28.7998 0.84082C28.9095 0.618529 29.0795 0.431706 29.29 0.300781C29.5007 0.169838 29.7442 0.0996094 29.9922 0.0996094ZM29.9023 4.61426L28.5762 7.30176C28.4808 7.49499 28.3394 7.6624 28.165 7.78906C27.9908 7.91558 27.7883 7.99731 27.5752 8.02832L24.6094 8.45996L24.4082 8.48926L24.5537 8.62988L26.7002 10.7227C26.8543 10.873 26.9696 11.0589 27.0361 11.2637C27.1026 11.4684 27.1184 11.6862 27.082 11.8984L26.5752 14.8525L26.541 15.0518L26.7207 14.958L29.373 13.5635C29.5638 13.4632 29.7767 13.4102 29.9922 13.4102C30.2076 13.4102 30.4197 13.4632 30.6104 13.5635L33.2637 14.958L33.4424 15.0518L33.4082 14.8525L32.9014 11.8984C32.865 11.6863 32.8808 11.4684 32.9473 11.2637C33.0138 11.0588 33.1299 10.8731 33.2842 10.7227L35.4297 8.62988L35.5752 8.48926L35.374 8.45996L32.4092 8.02832C32.1959 7.99733 31.9927 7.91572 31.8184 7.78906C31.6441 7.66244 31.5036 7.49491 31.4082 7.30176L30.082 4.61426L29.9922 4.43164L29.9023 4.61426Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                    <path d="M54.0059 11.614C54.2534 11.5999 54.5001 11.6546 54.7178 11.7732C54.9355 11.8919 55.116 12.0692 55.2383 12.2849C55.3606 12.5007 55.4203 12.747 55.4102 12.9949L55.2002 18.1326L55.1982 18.1853L55.2402 18.2166L59.3545 21.3015L59.3623 21.3074C59.5567 21.4555 59.7062 21.6547 59.7949 21.8826C59.8848 22.1136 59.9089 22.3654 59.8633 22.6091C59.8176 22.8527 59.7044 23.0786 59.5371 23.2615C59.3697 23.4444 59.1547 23.5773 58.916 23.6443L53.9648 25.033L53.9141 25.0466L53.8975 25.0964L52.2354 29.9626L52.2344 29.9656C52.0796 30.4698 51.6341 30.7749 51.1484 30.8386C50.6627 30.9022 50.1532 30.7219 49.873 30.2722L49.8711 30.2693L47.0205 25.99L46.9912 25.946H46.9385L41.7979 25.8679C41.55 25.8642 41.3082 25.791 41.0996 25.657C40.891 25.5229 40.7236 25.3332 40.6172 25.1091C40.5108 24.8851 40.4692 24.6358 40.4971 24.3894C40.525 24.143 40.6216 23.9091 40.7754 23.7146L43.9639 19.6814L43.9961 19.6404L43.9814 19.5896L42.4658 14.6765C42.3928 14.4396 42.3881 14.1868 42.4512 13.947C42.5142 13.7072 42.6431 13.4895 42.8232 13.3191C43.0034 13.1487 43.2278 13.0318 43.4707 12.9822C43.7136 12.9326 43.9658 12.9527 44.1982 13.0388L49.0195 14.825L49.0684 14.8435L49.1123 14.8132L53.3164 11.8542C53.5192 11.7114 53.7582 11.6282 54.0059 11.614ZM52.4785 15.6941L50.0273 17.4197C49.8512 17.5436 49.6472 17.6224 49.4336 17.6501C49.22 17.6779 49.0028 17.6537 48.8008 17.5789L45.9902 16.5378L45.7998 16.4666L45.8594 16.6609L46.7422 19.5242C46.8057 19.7301 46.8189 19.9491 46.7793 20.1609C46.7397 20.3727 46.6492 20.5719 46.5156 20.741L44.6562 23.0916L44.5303 23.2507L44.7334 23.2537L47.7305 23.2986C47.9458 23.3019 48.1576 23.3576 48.3467 23.4607C48.5358 23.5639 48.697 23.712 48.8164 23.8914L50.4775 26.3855L50.5898 26.5544L50.6553 26.3621L51.625 23.5261C51.6947 23.3222 51.8132 23.1381 51.9697 22.99C52.1262 22.842 52.3161 22.7337 52.5234 22.6755L55.4102 21.8669L55.6045 21.8123L55.4424 21.6902L53.0449 19.8923C52.8725 19.7631 52.734 19.5938 52.6416 19.3992C52.5492 19.2046 52.5059 18.9904 52.5146 18.7751L52.6357 15.78L52.6445 15.5779L52.4785 15.6941Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                    <path d="M5.98047 11.614C6.22807 11.6283 6.46715 11.7114 6.66992 11.8542L10.874 14.8132L10.917 14.8435L10.9658 14.825L15.7871 13.0388C16.0195 12.9527 16.2718 12.9327 16.5146 12.9822C16.7575 13.0318 16.982 13.1488 17.1621 13.3191C17.3423 13.4895 17.4711 13.7072 17.5342 13.947C17.5972 14.1869 17.5926 14.4395 17.5195 14.6765L16.0049 19.5896L15.9893 19.6404L16.0215 19.6814L19.21 23.7146L19.2129 23.7175C19.5534 24.1208 19.5678 24.6612 19.3574 25.1042C19.147 25.5473 18.7192 25.877 18.1914 25.8679H18.1875L13.0469 25.946L12.9941 25.947L12.9648 25.99L10.1143 30.2693L10.1123 30.2722C9.83227 30.7217 9.32353 30.902 8.83789 30.8386C8.35211 30.7751 7.90678 30.47 7.75195 29.9656L7.75 29.9626L6.08789 25.0964L6.07129 25.0476L6.02051 25.033L1.07031 23.6443C0.831531 23.5773 0.61567 23.4444 0.448242 23.2615C0.281054 23.0787 0.168675 22.8526 0.123047 22.6091C0.0774548 22.3655 0.100567 22.1136 0.19043 21.8826C0.280362 21.6515 0.4335 21.4503 0.631836 21.3015L4.74512 18.2166L4.78711 18.1853L4.78516 18.1326L4.57617 12.9949C4.56606 12.747 4.62575 12.5007 4.74805 12.2849C4.87034 12.0693 5.05089 11.8918 5.26855 11.7732C5.48626 11.6547 5.73299 11.5998 5.98047 11.614ZM7.34961 15.78L7.47168 18.7742C7.48043 18.9895 7.43717 19.2045 7.34473 19.3992C7.25229 19.5937 7.11374 19.7631 6.94141 19.8923L4.54297 21.6902L4.38086 21.8123L4.57617 21.8669L7.46191 22.6765C7.6694 22.7347 7.86003 22.8429 8.0166 22.991C8.17287 23.1389 8.29072 23.3225 8.36035 23.5261L9.33008 26.3621L9.39551 26.5544L9.50781 26.3855L11.1689 23.8923L11.1729 23.8845C11.2918 23.7081 11.4518 23.5627 11.6387 23.4607C11.8278 23.3576 12.0395 23.3019 12.2549 23.2986L15.252 23.2537L15.4551 23.2507L15.3291 23.0916L13.4707 20.741C13.3371 20.572 13.2457 20.3726 13.2061 20.1609C13.1664 19.9491 13.1797 19.7301 13.2432 19.5242L14.126 16.6609L14.1855 16.4675L13.9961 16.5378L11.1855 17.5789C10.9834 17.6537 10.7655 17.6779 10.5518 17.6501C10.3382 17.6223 10.1341 17.5437 9.95801 17.4197L7.50781 15.6941L7.3418 15.5769L7.34961 15.78Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h2 class="count"><span class="counter-number">3,560</span>+</h2>
                                <p>Package Delivered</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="counter__item">
                            <div class="counter__icon">
                                <svg width="48" height="60" viewBox="0 0 48 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M41.6516 7.86113H36.2234V5.43278C36.2234 4.64711 35.3664 4.29003 34.5807 4.29003H30.3668C29.3669 1.43309 26.8671 0.00462454 24.0101 0.00462454C21.1847 -0.101598 18.6147 1.63091 17.6535 4.29003H13.5109C12.7253 4.29003 11.9396 4.64711 11.9396 5.43278V7.86113H6.51131C3.29456 7.89544 0.662918 10.433 0.511719 13.6464V54.5718C0.511719 57.7145 3.36865 60 6.51131 60H41.6516C44.7942 60 47.6512 57.7145 47.6512 54.5718V13.6465C47.5 10.433 44.8683 7.89544 41.6516 7.86113ZM14.7964 7.14696H18.7247C19.4104 7.0633 19.9612 6.54162 20.0818 5.86136C20.5048 4.01935 22.1208 2.6971 24.0101 2.64734C25.882 2.70407 27.4737 4.03042 27.867 5.86136C27.9951 6.56513 28.5822 7.09351 29.2954 7.14696H33.3666V12.8608H14.7964V7.14696ZM44.7942 54.572C44.7942 56.1433 43.2229 57.1432 41.6516 57.1432H6.51131C4.93998 57.1432 3.36865 56.1433 3.36865 54.572V13.6465C3.51439 12.0109 4.86944 10.7481 6.51131 10.7182H11.9395V14.3608C12.0149 15.1611 12.708 15.7597 13.5108 15.7179H34.5806C35.3981 15.7626 36.113 15.1722 36.2233 14.3608V10.7181H41.6514C43.2932 10.7481 44.6484 12.0108 44.7941 13.6464V54.572H44.7942Z" fill="currentColor" />
                                    <path d="M18.5823 31.9307C18.0465 31.3659 17.1571 31.3341 16.5824 31.8593L12.0112 36.2161L10.0828 34.2162C9.54706 33.6514 8.65764 33.6197 8.08291 34.1448C7.52965 34.7245 7.52965 35.6364 8.08291 36.2161L11.0112 39.2159C11.2647 39.4997 11.6308 39.6566 12.0111 39.6445C12.3879 39.6391 12.7473 39.4851 13.011 39.2159L18.582 33.9306C19.1343 33.424 19.1712 32.5654 18.6644 32.0133C18.6385 31.9844 18.611 31.9569 18.5823 31.9307Z" fill="currentColor" />
                                    <path d="M39.0804 35.002H22.6531C21.8641 35.002 21.2246 35.6415 21.2246 36.4304C21.2246 37.2194 21.8641 37.8589 22.6531 37.8589H39.0804C39.8693 37.8589 40.5089 37.2194 40.5089 36.4304C40.5089 35.6415 39.8693 35.002 39.0804 35.002Z" fill="currentColor" />
                                    <path d="M18.5823 20.5032C18.0465 19.9385 17.1571 19.9066 16.5824 20.4318L12.0112 24.7886L10.0828 22.7887C9.54706 22.224 8.65764 22.1921 8.08291 22.7173C7.52965 23.297 7.52965 24.209 8.08291 24.7886L11.0112 27.7884C11.2647 28.0722 11.6308 28.2291 12.0111 28.217C12.3879 28.2116 12.7473 28.0576 13.011 27.7884L18.582 22.5031C19.1343 21.9965 19.1712 21.1379 18.6644 20.5858C18.6385 20.5569 18.611 20.5294 18.5823 20.5032Z" fill="currentColor" />
                                    <path d="M39.0804 23.5742H22.6531C21.8641 23.5742 21.2246 24.2137 21.2246 25.0027C21.2246 25.7916 21.8641 26.4312 22.6531 26.4312H39.0804C39.8693 26.4312 40.5089 25.7916 40.5089 25.0027C40.5089 24.2137 39.8693 23.5742 39.0804 23.5742Z" fill="currentColor" />
                                    <path d="M18.5823 43.3584C18.0465 42.7936 17.1571 42.7619 16.5824 43.287L12.0112 47.6438L10.0828 45.6439C9.54706 45.0791 8.65764 45.0474 8.08291 45.5725C7.52965 46.1521 7.52965 47.0641 8.08291 47.6438L11.0112 50.6436C11.2647 50.9274 11.6308 51.0843 12.0111 51.0722C12.3879 51.0668 12.7473 50.9128 13.011 50.6436L18.582 45.3583C19.1343 44.8516 19.1712 43.9931 18.6644 43.4409C18.6385 43.4122 18.611 43.3848 18.5823 43.3584Z" fill="currentColor" />
                                    <path d="M39.0804 46.4297H22.6531C21.8641 46.4297 21.2246 47.0692 21.2246 47.8582C21.2246 48.6471 21.8641 49.2866 22.6531 49.2866H39.0804C39.8693 49.2866 40.5089 48.6471 40.5089 47.8582C40.5089 47.0692 39.8693 46.4297 39.0804 46.4297Z" fill="currentColor" />
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h2 class="count"><span class="counter-number">1200</span>+</h2>
                                <p>Countries Covered</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="counter__item">
                            <div class="counter__icon">
                                <svg width="51" height="60" viewBox="0 0 51 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M43.2709 25.4524C43.0197 25.2013 42.7633 24.9575 42.5036 24.7185L44.3956 5.7982C44.5436 4.31859 44.0562 2.83758 43.0584 1.73496C42.0605 0.632344 40.6355 0 39.1486 0H11.7616C10.2746 0 8.84937 0.632344 7.85164 1.73496C6.85391 2.83746 6.36641 4.31848 6.51441 5.7982L8.40652 24.7185C8.14684 24.9577 7.89055 25.2014 7.63941 25.4524C2.88055 30.2112 0.259766 36.5384 0.259766 43.2682C0.259766 49.1399 2.32438 54.8569 6.07332 59.366L6.60043 60H44.3097L44.8368 59.366C48.5858 54.857 50.6504 49.14 50.6504 43.2682C50.6504 36.5384 48.0296 30.2112 43.2709 25.4524ZM10.4584 4.09395C10.7959 3.72105 11.2587 3.51562 11.7617 3.51562H39.1486C39.6515 3.51562 40.1144 3.72105 40.4519 4.09395C40.7894 4.46684 40.9476 4.94789 40.8976 5.4484L39.2262 22.1617C38.155 21.4597 37.036 20.8436 35.8776 20.3169L37.2059 7.03125H13.704L15.0325 20.3168C13.8741 20.8436 12.7551 21.4596 11.6839 22.1617L10.0126 5.44828C9.96254 4.94777 10.1207 4.46684 10.4584 4.09395ZM33.3214 10.5469L32.4702 19.059C30.2188 18.4102 27.8629 18.0729 25.4551 18.0729C23.0472 18.0729 20.6914 18.4102 18.44 19.059L17.5887 10.5469H33.3214ZM42.6406 56.4844H8.26953C5.36574 52.7105 3.77539 48.0492 3.77539 43.2682C3.77539 31.314 13.5009 21.5885 25.4551 21.5885C37.4094 21.5885 47.1348 31.314 47.1348 43.2682C47.1348 48.0493 45.5444 52.7105 42.6406 56.4844Z" fill="currentColor" />
                                    <path d="M25.4551 34.6875C21.578 34.6875 18.4238 37.8417 18.4238 41.7188C18.4238 45.5958 21.578 48.75 25.4551 48.75C29.3321 48.75 32.4863 45.5958 32.4863 41.7188C32.4863 37.8417 29.3321 34.6875 25.4551 34.6875ZM25.4551 45.2344C23.5166 45.2344 21.9395 43.6573 21.9395 41.7188C21.9395 39.7802 23.5166 38.2031 25.4551 38.2031C27.3936 38.2031 28.9707 39.7802 28.9707 41.7188C28.9707 43.6573 27.3936 45.2344 25.4551 45.2344Z" fill="currentColor" />
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h2 class="count"><span class="counter-number">1800</span>+</h2>
                                <p>Happy Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter-area-end -->

        <!-- product-area -->
        <section id="products" class="product__area section-py-150 section-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb-60">
                            <span class="sub-title">our product</span>
                            <h2 class="title">Product showcase</h2>
                        </div>
                    </div>
                </div>
                <div class="row gutter-y-30 gutter-20">
                    <div class="col-xl-3 col-lg-4 col-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                        <div class="product__item">
                            <div class="product__thumb">
                                <a href="shop-details.html"><img src="{{Vite::asset('resources/assets/img/product/product_img01.png')}}" alt="img"></a>
                                <div class="product__action">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_01.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_02.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_03.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__content">
                                <h2 class="title"><a href="shop-details.html">Box full of muscule</a></h2>
                                <h2 class="price">$450.00</h2>
                                <div class="rating">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2441 6.91016H19.5098L13.6318 11.1807L15.877 18.0898L9.99902 13.8193L4.12109 18.0898L6.36621 11.1807L0.488281 6.91016H7.75391L9.99902 0L12.2441 6.91016ZM9.99902 12.584L10.5869 13.0107L13.9746 15.4717L12.6807 11.4893L12.4561 10.7988L13.0439 10.3711L16.4316 7.91016H11.5176L11.293 7.21875L9.99902 3.23535V12.584Z" fill="currentColor" />
                                    </svg>
                                    <span>(30)</span>
                                </div>
                                <div class="product__content-bottom">
                                    <a href="shop-details.html" class="product__cart">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.0389 6.71874V9.84375C20.0389 10.2753 19.6892 10.625 19.2577 10.625H18.7439L18.4148 13.5542C18.3699 13.9534 18.0318 14.2482 17.6393 14.2484C17.6102 14.2484 17.5809 14.2467 17.5511 14.2433C17.1224 14.1953 16.8138 13.8084 16.8621 13.3798L17.2692 9.75662C17.3136 9.36142 17.6477 9.0625 18.0455 9.0625H18.4766V7.49999H1.60157V9.0625H14.9219C15.3534 9.0625 15.7032 9.41238 15.7032 9.84375C15.7032 10.2753 15.3534 10.625 14.9219 10.625H2.92084L3.69233 17.061C3.78632 17.8458 4.45329 18.4375 5.24369 18.4375H14.897C15.6932 18.4375 16.3608 17.8407 16.4498 17.0494C16.4978 16.6206 16.8845 16.3123 17.3133 16.3603C17.742 16.4085 18.0506 16.7952 18.0025 17.224C17.8246 18.8065 16.4896 20 14.897 20H5.24369C3.66288 20 2.32895 18.8164 2.14081 17.2469L1.3472 10.625H0.820314C0.388795 10.625 0.0390625 10.2753 0.0390625 9.84375V6.71874C0.0390625 6.28722 0.388795 5.93749 0.820314 5.93749H3.59131L7.71959 0.318736C7.97502 -0.0288593 8.46391 -0.10378 8.81166 0.151805C9.15941 0.407238 9.23418 0.89613 8.97874 1.24388L5.53025 5.93749H14.5767L11.1281 1.24388C10.8727 0.89613 10.9474 0.407238 11.2952 0.151805C11.6429 -0.10378 12.1318 -0.0290119 12.3874 0.318736L16.5155 5.93749H19.2577C19.6892 5.93749 20.0389 6.28737 20.0389 6.71874ZM9.25783 12.9688V16.0938C9.25783 16.5253 9.60756 16.875 10.0391 16.875C10.4704 16.875 10.8203 16.5253 10.8203 16.0938V12.9688C10.8203 12.5372 10.4704 12.1875 10.0391 12.1875C9.60756 12.1875 9.25783 12.5372 9.25783 12.9688ZM12.3828 12.9688V16.0938C12.3828 16.5253 12.7326 16.875 13.1641 16.875C13.5955 16.875 13.9453 16.5253 13.9453 16.0938V12.9688C13.9453 12.5372 13.5955 12.1875 13.1641 12.1875C12.7326 12.1875 12.3828 12.5372 12.3828 12.9688ZM6.13282 12.9688V16.0938C6.13282 16.5253 6.48255 16.875 6.91407 16.875C7.34544 16.875 7.69533 16.5253 7.69533 16.0938V12.9688C7.69533 12.5372 7.34544 12.1875 6.91407 12.1875C6.48255 12.1875 6.13282 12.5372 6.13282 12.9688Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="shop-details.html" class="tg-btn tg-btn-two">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="200">
                        <div class="product__item">
                            <div class="product__thumb">
                                <a href="shop-details.html"><img src="{{Vite::asset('resources/assets/img/product/product_img02.png')}}" alt="img"></a>
                                <div class="product__action">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_01.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_02.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_03.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__content">
                                <h2 class="title"><a href="shop-details.html">PRO Q 01 PROTIEN</a></h2>
                                <h2 class="price">$450.00</h2>
                                <div class="rating">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2441 6.91016H19.5098L13.6318 11.1807L15.877 18.0898L9.99902 13.8193L4.12109 18.0898L6.36621 11.1807L0.488281 6.91016H7.75391L9.99902 0L12.2441 6.91016ZM9.99902 12.584L10.5869 13.0107L13.9746 15.4717L12.6807 11.4893L12.4561 10.7988L13.0439 10.3711L16.4316 7.91016H11.5176L11.293 7.21875L9.99902 3.23535V12.584Z" fill="currentColor" />
                                    </svg>
                                    <span>(30)</span>
                                </div>
                                <div class="product__content-bottom">
                                    <a href="shop-details.html" class="product__cart">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.0389 6.71874V9.84375C20.0389 10.2753 19.6892 10.625 19.2577 10.625H18.7439L18.4148 13.5542C18.3699 13.9534 18.0318 14.2482 17.6393 14.2484C17.6102 14.2484 17.5809 14.2467 17.5511 14.2433C17.1224 14.1953 16.8138 13.8084 16.8621 13.3798L17.2692 9.75662C17.3136 9.36142 17.6477 9.0625 18.0455 9.0625H18.4766V7.49999H1.60157V9.0625H14.9219C15.3534 9.0625 15.7032 9.41238 15.7032 9.84375C15.7032 10.2753 15.3534 10.625 14.9219 10.625H2.92084L3.69233 17.061C3.78632 17.8458 4.45329 18.4375 5.24369 18.4375H14.897C15.6932 18.4375 16.3608 17.8407 16.4498 17.0494C16.4978 16.6206 16.8845 16.3123 17.3133 16.3603C17.742 16.4085 18.0506 16.7952 18.0025 17.224C17.8246 18.8065 16.4896 20 14.897 20H5.24369C3.66288 20 2.32895 18.8164 2.14081 17.2469L1.3472 10.625H0.820314C0.388795 10.625 0.0390625 10.2753 0.0390625 9.84375V6.71874C0.0390625 6.28722 0.388795 5.93749 0.820314 5.93749H3.59131L7.71959 0.318736C7.97502 -0.0288593 8.46391 -0.10378 8.81166 0.151805C9.15941 0.407238 9.23418 0.89613 8.97874 1.24388L5.53025 5.93749H14.5767L11.1281 1.24388C10.8727 0.89613 10.9474 0.407238 11.2952 0.151805C11.6429 -0.10378 12.1318 -0.0290119 12.3874 0.318736L16.5155 5.93749H19.2577C19.6892 5.93749 20.0389 6.28737 20.0389 6.71874ZM9.25783 12.9688V16.0938C9.25783 16.5253 9.60756 16.875 10.0391 16.875C10.4704 16.875 10.8203 16.5253 10.8203 16.0938V12.9688C10.8203 12.5372 10.4704 12.1875 10.0391 12.1875C9.60756 12.1875 9.25783 12.5372 9.25783 12.9688ZM12.3828 12.9688V16.0938C12.3828 16.5253 12.7326 16.875 13.1641 16.875C13.5955 16.875 13.9453 16.5253 13.9453 16.0938V12.9688C13.9453 12.5372 13.5955 12.1875 13.1641 12.1875C12.7326 12.1875 12.3828 12.5372 12.3828 12.9688ZM6.13282 12.9688V16.0938C6.13282 16.5253 6.48255 16.875 6.91407 16.875C7.34544 16.875 7.69533 16.5253 7.69533 16.0938V12.9688C7.69533 12.5372 7.34544 12.1875 6.91407 12.1875C6.48255 12.1875 6.13282 12.5372 6.13282 12.9688Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="shop-details.html" class="tg-btn tg-btn-two">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="product__item">
                            <div class="product__thumb">
                                <a href="shop-details.html"><img src="{{Vite::asset('resources/assets/img/product/product_img03.png')}}" alt="img"></a>
                                <div class="product__action">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_01.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_02.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_03.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__content">
                                <h2 class="title"><a href="shop-details.html">YELLOW PROTIEN</a></h2>
                                <h2 class="price">$450.00</h2>
                                <div class="rating">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2441 6.91016H19.5098L13.6318 11.1807L15.877 18.0898L9.99902 13.8193L4.12109 18.0898L6.36621 11.1807L0.488281 6.91016H7.75391L9.99902 0L12.2441 6.91016ZM9.99902 12.584L10.5869 13.0107L13.9746 15.4717L12.6807 11.4893L12.4561 10.7988L13.0439 10.3711L16.4316 7.91016H11.5176L11.293 7.21875L9.99902 3.23535V12.584Z" fill="currentColor" />
                                    </svg>
                                    <span>(30)</span>
                                </div>
                                <div class="product__content-bottom">
                                    <a href="shop-details.html" class="product__cart">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.0389 6.71874V9.84375C20.0389 10.2753 19.6892 10.625 19.2577 10.625H18.7439L18.4148 13.5542C18.3699 13.9534 18.0318 14.2482 17.6393 14.2484C17.6102 14.2484 17.5809 14.2467 17.5511 14.2433C17.1224 14.1953 16.8138 13.8084 16.8621 13.3798L17.2692 9.75662C17.3136 9.36142 17.6477 9.0625 18.0455 9.0625H18.4766V7.49999H1.60157V9.0625H14.9219C15.3534 9.0625 15.7032 9.41238 15.7032 9.84375C15.7032 10.2753 15.3534 10.625 14.9219 10.625H2.92084L3.69233 17.061C3.78632 17.8458 4.45329 18.4375 5.24369 18.4375H14.897C15.6932 18.4375 16.3608 17.8407 16.4498 17.0494C16.4978 16.6206 16.8845 16.3123 17.3133 16.3603C17.742 16.4085 18.0506 16.7952 18.0025 17.224C17.8246 18.8065 16.4896 20 14.897 20H5.24369C3.66288 20 2.32895 18.8164 2.14081 17.2469L1.3472 10.625H0.820314C0.388795 10.625 0.0390625 10.2753 0.0390625 9.84375V6.71874C0.0390625 6.28722 0.388795 5.93749 0.820314 5.93749H3.59131L7.71959 0.318736C7.97502 -0.0288593 8.46391 -0.10378 8.81166 0.151805C9.15941 0.407238 9.23418 0.89613 8.97874 1.24388L5.53025 5.93749H14.5767L11.1281 1.24388C10.8727 0.89613 10.9474 0.407238 11.2952 0.151805C11.6429 -0.10378 12.1318 -0.0290119 12.3874 0.318736L16.5155 5.93749H19.2577C19.6892 5.93749 20.0389 6.28737 20.0389 6.71874ZM9.25783 12.9688V16.0938C9.25783 16.5253 9.60756 16.875 10.0391 16.875C10.4704 16.875 10.8203 16.5253 10.8203 16.0938V12.9688C10.8203 12.5372 10.4704 12.1875 10.0391 12.1875C9.60756 12.1875 9.25783 12.5372 9.25783 12.9688ZM12.3828 12.9688V16.0938C12.3828 16.5253 12.7326 16.875 13.1641 16.875C13.5955 16.875 13.9453 16.5253 13.9453 16.0938V12.9688C13.9453 12.5372 13.5955 12.1875 13.1641 12.1875C12.7326 12.1875 12.3828 12.5372 12.3828 12.9688ZM6.13282 12.9688V16.0938C6.13282 16.5253 6.48255 16.875 6.91407 16.875C7.34544 16.875 7.69533 16.5253 7.69533 16.0938V12.9688C7.69533 12.5372 7.34544 12.1875 6.91407 12.1875C6.48255 12.1875 6.13282 12.5372 6.13282 12.9688Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="shop-details.html" class="tg-btn tg-btn-two">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <div class="product__item">
                            <div class="product__thumb">
                                <a href="shop-details.html"><img src="{{Vite::asset('resources/assets/img/product/product_img04.png')}}" alt="img"></a>
                                <div class="product__action">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_01.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_02.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html">
                                                <img src="{{Vite::asset('resources/assets/img/icons/icon_03.svg')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__content">
                                <h2 class="title"><a href="shop-details.html">AMINO ENERGY 4B00</a></h2>
                                <h2 class="price">$450.00</h2>
                                <div class="rating">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2441 6.91016H19.5098L13.6318 11.1807L15.877 18.0898L9.99902 13.8193L4.12109 18.0898L6.36621 11.1807L0.488281 6.91016H7.75391L9.99902 0L12.2441 6.91016ZM9.99902 12.584L10.5869 13.0107L13.9746 15.4717L12.6807 11.4893L12.4561 10.7988L13.0439 10.3711L16.4316 7.91016H11.5176L11.293 7.21875L9.99902 3.23535V12.584Z" fill="currentColor" />
                                    </svg>
                                    <span>(30)</span>
                                </div>
                                <div class="product__content-bottom">
                                    <a href="shop-details.html" class="product__cart">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.0389 6.71874V9.84375C20.0389 10.2753 19.6892 10.625 19.2577 10.625H18.7439L18.4148 13.5542C18.3699 13.9534 18.0318 14.2482 17.6393 14.2484C17.6102 14.2484 17.5809 14.2467 17.5511 14.2433C17.1224 14.1953 16.8138 13.8084 16.8621 13.3798L17.2692 9.75662C17.3136 9.36142 17.6477 9.0625 18.0455 9.0625H18.4766V7.49999H1.60157V9.0625H14.9219C15.3534 9.0625 15.7032 9.41238 15.7032 9.84375C15.7032 10.2753 15.3534 10.625 14.9219 10.625H2.92084L3.69233 17.061C3.78632 17.8458 4.45329 18.4375 5.24369 18.4375H14.897C15.6932 18.4375 16.3608 17.8407 16.4498 17.0494C16.4978 16.6206 16.8845 16.3123 17.3133 16.3603C17.742 16.4085 18.0506 16.7952 18.0025 17.224C17.8246 18.8065 16.4896 20 14.897 20H5.24369C3.66288 20 2.32895 18.8164 2.14081 17.2469L1.3472 10.625H0.820314C0.388795 10.625 0.0390625 10.2753 0.0390625 9.84375V6.71874C0.0390625 6.28722 0.388795 5.93749 0.820314 5.93749H3.59131L7.71959 0.318736C7.97502 -0.0288593 8.46391 -0.10378 8.81166 0.151805C9.15941 0.407238 9.23418 0.89613 8.97874 1.24388L5.53025 5.93749H14.5767L11.1281 1.24388C10.8727 0.89613 10.9474 0.407238 11.2952 0.151805C11.6429 -0.10378 12.1318 -0.0290119 12.3874 0.318736L16.5155 5.93749H19.2577C19.6892 5.93749 20.0389 6.28737 20.0389 6.71874ZM9.25783 12.9688V16.0938C9.25783 16.5253 9.60756 16.875 10.0391 16.875C10.4704 16.875 10.8203 16.5253 10.8203 16.0938V12.9688C10.8203 12.5372 10.4704 12.1875 10.0391 12.1875C9.60756 12.1875 9.25783 12.5372 9.25783 12.9688ZM12.3828 12.9688V16.0938C12.3828 16.5253 12.7326 16.875 13.1641 16.875C13.5955 16.875 13.9453 16.5253 13.9453 16.0938V12.9688C13.9453 12.5372 13.5955 12.1875 13.1641 12.1875C12.7326 12.1875 12.3828 12.5372 12.3828 12.9688ZM6.13282 12.9688V16.0938C6.13282 16.5253 6.48255 16.875 6.91407 16.875C7.34544 16.875 7.69533 16.5253 7.69533 16.0938V12.9688C7.69533 12.5372 7.34544 12.1875 6.91407 12.1875C6.48255 12.1875 6.13282 12.5372 6.13282 12.9688Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                    <a href="shop-details.html" class="tg-btn tg-btn-two">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__shape">
                <img src="{{Vite::asset('resources/assets/img/images/product_shape.svg')}}" alt="shape" data-sal="slide-left" data-sal-duration="700" data-sal-delay="100">
            </div>
        </section>
        <!-- product-area-end -->

        <!-- video-area -->
        <div class="video__area">
            <div class="container">
                <div class="video__bg" data-background="{{Vite::asset('resources/assets/img/bg/video_bg.jpg')}}" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                    <a href="https://www.youtube.com/watch?v=7vbVft0M84o" class="popup-video">
                        <img src="{{Vite::asset('resources/assets/img/images/video.svg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="section__shape video__shape" data-background="{{Vite::asset('resources/assets/img/slider/slider_shape.svg')}}"></div>
        </div>
        <!-- video-area-end -->

        <!-- faq-area -->
        <section class="faq__area section-py-150">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="faq__img">
                            <img src="{{Vite::asset('resources/assets/img/images/faq_img01.jpg')}}" alt="img">
                            <img src="{{Vite::asset('resources/assets/img/images/faq_img02.jpg')}}" alt="img" class="img-two" data-sal="slide-left" data-sal-duration="700" data-sal-delay="100">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq__content">
                            <div class="section__title mb-45">
                                <span class="sub-title">our faq</span>
                                <h2 class="title">GET EVERY ANSWER</h2>
                            </div>
                            <div class="faq__item-wrap">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                What is world of spirits and cocktail ?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="thumb">
                                                    <img src="{{Vite::asset('resources/assets/img/insta/insta_img01.jpg')}}" alt="img">
                                                </div>
                                                <p>Vitamin D3 supplements are recommended for people at risk for vitamin Ddeficiency. Low vitamin D levels cause depression</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                What is this supplement made of?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="thumb">
                                                    <img src="{{Vite::asset('resources/assets/img/insta/insta_img02.jpg')}}" alt="img">
                                                </div>
                                                <p>Vitamin D3 supplements are recommended for people at risk for vitamin Ddeficiency. Low vitamin D levels cause depression</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Can I take it with other medications?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="thumb">
                                                    <img src="{{Vite::asset('resources/assets/img/insta/insta_img03.jpg')}}" alt="img">
                                                </div>
                                                <p>Vitamin D3 supplements are recommended for people at risk for vitamin Ddeficiency. Low vitamin D levels cause depression</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Do I need a prescription to buy it?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="thumb">
                                                    <img src="{{Vite::asset('resources/assets/img/insta/insta_img04.jpg')}}" alt="img">
                                                </div>
                                                <p>Vitamin D3 supplements are recommended for people at risk for vitamin Ddeficiency. Low vitamin D levels cause depression</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq__shape">
                <img src="{{Vite::asset('resources/assets/img/images/faq_shape.png')}}" alt="img" data-sal="slide-left" data-sal-duration="700" data-sal-delay="100">
            </div>
        </section>
        <!-- faq-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial__area section-bg-two section-py-150">
            <div class="section__bg-shape">
                <span class="top-shape" data-background="{{Vite::asset('resources/assets/img/bg/section_bg_shape01.svg')}}"></span>
                <span class="bottom-shape" data-background="{{Vite::asset('resources/assets/img/bg/section_bg_shape02.svg')}}"></span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section__title text-center white-title mb-70" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <span class="sub-title">clients feedback</span>
                            <h2 class="title">what our client saying</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial__item-wrap">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-7 col-md-9">
                            <div class="testimonial__avatar-active">
                                <div class="testimonial__avatar-item">
                                    <img src="{{Vite::asset('resources/assets/img/images/testi_avatar01.jpg')}}" alt="img">
                                </div>
                                <div class="testimonial__avatar-item">
                                    <img src="{{Vite::asset('resources/assets/img/images/testi_avatar02.jpg')}}" alt="img">
                                </div>
                                <div class="testimonial__avatar-item">
                                    <img src="{{Vite::asset('resources/assets/img/images/testi_avatar03.jpg')}}" alt="img">
                                </div>
                                <div class="testimonial__avatar-item">
                                    <img src="{{Vite::asset('resources/assets/img/images/testi_avatar04.jpg')}}" alt="img">
                                </div>
                                <div class="testimonial__avatar-item">
                                    <img src="{{Vite::asset('resources/assets/img/images/testi_avatar05.jpg')}}" alt="img">
                                </div>
                                <div class="testimonial__avatar-item">
                                    <img src="{{Vite::asset('resources/assets/img/images/testi_avatar03.jpg')}}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="testimonial__active">
                                <div class="testimonial__item">
                                    <div class="testimonial__info">
                                        <h4 class="title">Hilary Ouse</h4>
                                        <span>Lecturer, Oxford university</span>
                                    </div>
                                    <div class="rating testimonial__rating">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="testimonial__content">
                                        <span class="shape">
                                            <svg width="90" height="70" viewBox="0 0 90 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M71.2916 69.1934C65.0555 69.1934 60.0834 66.9239 56.3756 62.3851C52.499 58.0143 50.5607 52.2147 50.5607 44.9861C50.5607 35.5722 53.3415 26.7467 58.9038 18.5093C64.4656 10.4404 71.3759 4.38857 79.6345 0.353981L81.1514 3.37992C77.612 6.06944 74.4939 9.5159 71.7973 13.7184C69.1005 17.9212 67.1623 23.1323 65.9825 29.3521L71.2916 30.6131C77.1906 31.9578 81.8256 34.3954 85.1965 37.9256C88.3988 41.624 90 45.9947 90 51.0379C90 56.4173 88.2303 60.7881 84.6909 64.1502C80.9829 67.5123 76.5165 69.1934 71.2916 69.1934ZM20.7308 69.1934C14.4949 69.1934 9.52288 66.9239 5.81483 62.3851C1.93828 58.0143 0 52.2147 0 44.9861C0 35.5722 2.78111 26.7467 8.34303 18.5093C13.905 10.4404 20.8152 4.38857 29.0739 0.353981L30.5907 3.37992C27.0512 6.06944 23.9334 9.5159 21.2366 13.7184C18.5399 17.9212 16.6017 23.1323 15.4218 29.3521L20.7308 30.6131C26.6301 31.9578 31.265 34.3954 34.6358 37.9256C37.838 41.624 39.4393 45.9947 39.4393 51.0379C39.4393 56.4173 37.6695 60.7881 34.1303 64.1502C30.4222 67.5123 25.9557 69.1934 20.7308 69.1934Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <p>I need to get a certification for English proficiency and Acadia is my best choice. Their tutors are smart and professional when dealing with students. I wanted to place a review since ! Thanks and 5 stars!</p>
                                        <span class="shape shape-two">
                                            <svg width="90" height="69" viewBox="0 0 90 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.7084 0C24.9445 0 29.9166 2.26942 33.6244 6.80827C37.501 11.179 39.4393 16.9787 39.4393 24.2072C39.4393 33.6212 36.6585 42.4467 31.0962 50.684C25.5344 58.7529 18.6241 64.8048 10.3655 68.8394L8.84855 65.8134C12.388 63.1239 15.5061 59.6775 18.2027 55.475C20.8995 51.2722 22.8377 46.061 24.0175 39.8412L18.7084 38.5803C12.8094 37.2355 8.17438 34.798 4.80349 31.2677C1.60117 27.5694 0 23.1986 0 18.1554C0 12.7761 1.76971 8.40529 5.30913 5.04317C9.01712 1.68106 13.4835 0 18.7084 0ZM69.2692 0C75.5051 0 80.4771 2.26942 84.1852 6.80827C88.0617 11.179 90 16.9787 90 24.2072C90 33.6212 87.2189 42.4467 81.657 50.684C76.095 58.7529 69.1848 64.8048 60.9261 68.8394L59.4093 65.8134C62.9488 63.1239 66.0666 59.6775 68.7634 55.475C71.4601 51.2722 73.3983 46.061 74.5782 39.8412L69.2692 38.5803C63.3699 37.2355 58.735 34.798 55.3642 31.2677C52.162 27.5694 50.5607 23.1986 50.5607 18.1554C50.5607 12.7761 52.3305 8.40529 55.8697 5.04317C59.5778 1.68106 64.0443 0 69.2692 0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__info">
                                        <h4 class="title">Hilary Ouse</h4>
                                        <span>Lecturer, Oxford university</span>
                                    </div>
                                    <div class="rating testimonial__rating">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="testimonial__content">
                                        <span class="shape">
                                            <svg width="90" height="70" viewBox="0 0 90 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M71.2916 69.1934C65.0555 69.1934 60.0834 66.9239 56.3756 62.3851C52.499 58.0143 50.5607 52.2147 50.5607 44.9861C50.5607 35.5722 53.3415 26.7467 58.9038 18.5093C64.4656 10.4404 71.3759 4.38857 79.6345 0.353981L81.1514 3.37992C77.612 6.06944 74.4939 9.5159 71.7973 13.7184C69.1005 17.9212 67.1623 23.1323 65.9825 29.3521L71.2916 30.6131C77.1906 31.9578 81.8256 34.3954 85.1965 37.9256C88.3988 41.624 90 45.9947 90 51.0379C90 56.4173 88.2303 60.7881 84.6909 64.1502C80.9829 67.5123 76.5165 69.1934 71.2916 69.1934ZM20.7308 69.1934C14.4949 69.1934 9.52288 66.9239 5.81483 62.3851C1.93828 58.0143 0 52.2147 0 44.9861C0 35.5722 2.78111 26.7467 8.34303 18.5093C13.905 10.4404 20.8152 4.38857 29.0739 0.353981L30.5907 3.37992C27.0512 6.06944 23.9334 9.5159 21.2366 13.7184C18.5399 17.9212 16.6017 23.1323 15.4218 29.3521L20.7308 30.6131C26.6301 31.9578 31.265 34.3954 34.6358 37.9256C37.838 41.624 39.4393 45.9947 39.4393 51.0379C39.4393 56.4173 37.6695 60.7881 34.1303 64.1502C30.4222 67.5123 25.9557 69.1934 20.7308 69.1934Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <p>I need to get a certification for English proficiency and Acadia is my best choice. Their tutors are smart and professional when dealing with students. I wanted to place a review since ! Thanks and 5 stars!</p>
                                        <span class="shape shape-two">
                                            <svg width="90" height="69" viewBox="0 0 90 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.7084 0C24.9445 0 29.9166 2.26942 33.6244 6.80827C37.501 11.179 39.4393 16.9787 39.4393 24.2072C39.4393 33.6212 36.6585 42.4467 31.0962 50.684C25.5344 58.7529 18.6241 64.8048 10.3655 68.8394L8.84855 65.8134C12.388 63.1239 15.5061 59.6775 18.2027 55.475C20.8995 51.2722 22.8377 46.061 24.0175 39.8412L18.7084 38.5803C12.8094 37.2355 8.17438 34.798 4.80349 31.2677C1.60117 27.5694 0 23.1986 0 18.1554C0 12.7761 1.76971 8.40529 5.30913 5.04317C9.01712 1.68106 13.4835 0 18.7084 0ZM69.2692 0C75.5051 0 80.4771 2.26942 84.1852 6.80827C88.0617 11.179 90 16.9787 90 24.2072C90 33.6212 87.2189 42.4467 81.657 50.684C76.095 58.7529 69.1848 64.8048 60.9261 68.8394L59.4093 65.8134C62.9488 63.1239 66.0666 59.6775 68.7634 55.475C71.4601 51.2722 73.3983 46.061 74.5782 39.8412L69.2692 38.5803C63.3699 37.2355 58.735 34.798 55.3642 31.2677C52.162 27.5694 50.5607 23.1986 50.5607 18.1554C50.5607 12.7761 52.3305 8.40529 55.8697 5.04317C59.5778 1.68106 64.0443 0 69.2692 0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__info">
                                        <h4 class="title">Hilary Ouse</h4>
                                        <span>Lecturer, Oxford university</span>
                                    </div>
                                    <div class="rating testimonial__rating">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="testimonial__content">
                                        <span class="shape">
                                            <svg width="90" height="70" viewBox="0 0 90 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M71.2916 69.1934C65.0555 69.1934 60.0834 66.9239 56.3756 62.3851C52.499 58.0143 50.5607 52.2147 50.5607 44.9861C50.5607 35.5722 53.3415 26.7467 58.9038 18.5093C64.4656 10.4404 71.3759 4.38857 79.6345 0.353981L81.1514 3.37992C77.612 6.06944 74.4939 9.5159 71.7973 13.7184C69.1005 17.9212 67.1623 23.1323 65.9825 29.3521L71.2916 30.6131C77.1906 31.9578 81.8256 34.3954 85.1965 37.9256C88.3988 41.624 90 45.9947 90 51.0379C90 56.4173 88.2303 60.7881 84.6909 64.1502C80.9829 67.5123 76.5165 69.1934 71.2916 69.1934ZM20.7308 69.1934C14.4949 69.1934 9.52288 66.9239 5.81483 62.3851C1.93828 58.0143 0 52.2147 0 44.9861C0 35.5722 2.78111 26.7467 8.34303 18.5093C13.905 10.4404 20.8152 4.38857 29.0739 0.353981L30.5907 3.37992C27.0512 6.06944 23.9334 9.5159 21.2366 13.7184C18.5399 17.9212 16.6017 23.1323 15.4218 29.3521L20.7308 30.6131C26.6301 31.9578 31.265 34.3954 34.6358 37.9256C37.838 41.624 39.4393 45.9947 39.4393 51.0379C39.4393 56.4173 37.6695 60.7881 34.1303 64.1502C30.4222 67.5123 25.9557 69.1934 20.7308 69.1934Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <p>I need to get a certification for English proficiency and Acadia is my best choice. Their tutors are smart and professional when dealing with students. I wanted to place a review since ! Thanks and 5 stars!</p>
                                        <span class="shape shape-two">
                                            <svg width="90" height="69" viewBox="0 0 90 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.7084 0C24.9445 0 29.9166 2.26942 33.6244 6.80827C37.501 11.179 39.4393 16.9787 39.4393 24.2072C39.4393 33.6212 36.6585 42.4467 31.0962 50.684C25.5344 58.7529 18.6241 64.8048 10.3655 68.8394L8.84855 65.8134C12.388 63.1239 15.5061 59.6775 18.2027 55.475C20.8995 51.2722 22.8377 46.061 24.0175 39.8412L18.7084 38.5803C12.8094 37.2355 8.17438 34.798 4.80349 31.2677C1.60117 27.5694 0 23.1986 0 18.1554C0 12.7761 1.76971 8.40529 5.30913 5.04317C9.01712 1.68106 13.4835 0 18.7084 0ZM69.2692 0C75.5051 0 80.4771 2.26942 84.1852 6.80827C88.0617 11.179 90 16.9787 90 24.2072C90 33.6212 87.2189 42.4467 81.657 50.684C76.095 58.7529 69.1848 64.8048 60.9261 68.8394L59.4093 65.8134C62.9488 63.1239 66.0666 59.6775 68.7634 55.475C71.4601 51.2722 73.3983 46.061 74.5782 39.8412L69.2692 38.5803C63.3699 37.2355 58.735 34.798 55.3642 31.2677C52.162 27.5694 50.5607 23.1986 50.5607 18.1554C50.5607 12.7761 52.3305 8.40529 55.8697 5.04317C59.5778 1.68106 64.0443 0 69.2692 0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__info">
                                        <h4 class="title">Hilary Ouse</h4>
                                        <span>Lecturer, Oxford university</span>
                                    </div>
                                    <div class="rating testimonial__rating">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="testimonial__content">
                                        <span class="shape">
                                            <svg width="90" height="70" viewBox="0 0 90 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M71.2916 69.1934C65.0555 69.1934 60.0834 66.9239 56.3756 62.3851C52.499 58.0143 50.5607 52.2147 50.5607 44.9861C50.5607 35.5722 53.3415 26.7467 58.9038 18.5093C64.4656 10.4404 71.3759 4.38857 79.6345 0.353981L81.1514 3.37992C77.612 6.06944 74.4939 9.5159 71.7973 13.7184C69.1005 17.9212 67.1623 23.1323 65.9825 29.3521L71.2916 30.6131C77.1906 31.9578 81.8256 34.3954 85.1965 37.9256C88.3988 41.624 90 45.9947 90 51.0379C90 56.4173 88.2303 60.7881 84.6909 64.1502C80.9829 67.5123 76.5165 69.1934 71.2916 69.1934ZM20.7308 69.1934C14.4949 69.1934 9.52288 66.9239 5.81483 62.3851C1.93828 58.0143 0 52.2147 0 44.9861C0 35.5722 2.78111 26.7467 8.34303 18.5093C13.905 10.4404 20.8152 4.38857 29.0739 0.353981L30.5907 3.37992C27.0512 6.06944 23.9334 9.5159 21.2366 13.7184C18.5399 17.9212 16.6017 23.1323 15.4218 29.3521L20.7308 30.6131C26.6301 31.9578 31.265 34.3954 34.6358 37.9256C37.838 41.624 39.4393 45.9947 39.4393 51.0379C39.4393 56.4173 37.6695 60.7881 34.1303 64.1502C30.4222 67.5123 25.9557 69.1934 20.7308 69.1934Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <p>I need to get a certification for English proficiency and Acadia is my best choice. Their tutors are smart and professional when dealing with students. I wanted to place a review since ! Thanks and 5 stars!</p>
                                        <span class="shape shape-two">
                                            <svg width="90" height="69" viewBox="0 0 90 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.7084 0C24.9445 0 29.9166 2.26942 33.6244 6.80827C37.501 11.179 39.4393 16.9787 39.4393 24.2072C39.4393 33.6212 36.6585 42.4467 31.0962 50.684C25.5344 58.7529 18.6241 64.8048 10.3655 68.8394L8.84855 65.8134C12.388 63.1239 15.5061 59.6775 18.2027 55.475C20.8995 51.2722 22.8377 46.061 24.0175 39.8412L18.7084 38.5803C12.8094 37.2355 8.17438 34.798 4.80349 31.2677C1.60117 27.5694 0 23.1986 0 18.1554C0 12.7761 1.76971 8.40529 5.30913 5.04317C9.01712 1.68106 13.4835 0 18.7084 0ZM69.2692 0C75.5051 0 80.4771 2.26942 84.1852 6.80827C88.0617 11.179 90 16.9787 90 24.2072C90 33.6212 87.2189 42.4467 81.657 50.684C76.095 58.7529 69.1848 64.8048 60.9261 68.8394L59.4093 65.8134C62.9488 63.1239 66.0666 59.6775 68.7634 55.475C71.4601 51.2722 73.3983 46.061 74.5782 39.8412L69.2692 38.5803C63.3699 37.2355 58.735 34.798 55.3642 31.2677C52.162 27.5694 50.5607 23.1986 50.5607 18.1554C50.5607 12.7761 52.3305 8.40529 55.8697 5.04317C59.5778 1.68106 64.0443 0 69.2692 0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__info">
                                        <h4 class="title">Hilary Ouse</h4>
                                        <span>Lecturer, Oxford university</span>
                                    </div>
                                    <div class="rating testimonial__rating">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="testimonial__content">
                                        <span class="shape">
                                            <svg width="90" height="70" viewBox="0 0 90 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M71.2916 69.1934C65.0555 69.1934 60.0834 66.9239 56.3756 62.3851C52.499 58.0143 50.5607 52.2147 50.5607 44.9861C50.5607 35.5722 53.3415 26.7467 58.9038 18.5093C64.4656 10.4404 71.3759 4.38857 79.6345 0.353981L81.1514 3.37992C77.612 6.06944 74.4939 9.5159 71.7973 13.7184C69.1005 17.9212 67.1623 23.1323 65.9825 29.3521L71.2916 30.6131C77.1906 31.9578 81.8256 34.3954 85.1965 37.9256C88.3988 41.624 90 45.9947 90 51.0379C90 56.4173 88.2303 60.7881 84.6909 64.1502C80.9829 67.5123 76.5165 69.1934 71.2916 69.1934ZM20.7308 69.1934C14.4949 69.1934 9.52288 66.9239 5.81483 62.3851C1.93828 58.0143 0 52.2147 0 44.9861C0 35.5722 2.78111 26.7467 8.34303 18.5093C13.905 10.4404 20.8152 4.38857 29.0739 0.353981L30.5907 3.37992C27.0512 6.06944 23.9334 9.5159 21.2366 13.7184C18.5399 17.9212 16.6017 23.1323 15.4218 29.3521L20.7308 30.6131C26.6301 31.9578 31.265 34.3954 34.6358 37.9256C37.838 41.624 39.4393 45.9947 39.4393 51.0379C39.4393 56.4173 37.6695 60.7881 34.1303 64.1502C30.4222 67.5123 25.9557 69.1934 20.7308 69.1934Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <p>I need to get a certification for English proficiency and Acadia is my best choice. Their tutors are smart and professional when dealing with students. I wanted to place a review since ! Thanks and 5 stars!</p>
                                        <span class="shape shape-two">
                                            <svg width="90" height="69" viewBox="0 0 90 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.7084 0C24.9445 0 29.9166 2.26942 33.6244 6.80827C37.501 11.179 39.4393 16.9787 39.4393 24.2072C39.4393 33.6212 36.6585 42.4467 31.0962 50.684C25.5344 58.7529 18.6241 64.8048 10.3655 68.8394L8.84855 65.8134C12.388 63.1239 15.5061 59.6775 18.2027 55.475C20.8995 51.2722 22.8377 46.061 24.0175 39.8412L18.7084 38.5803C12.8094 37.2355 8.17438 34.798 4.80349 31.2677C1.60117 27.5694 0 23.1986 0 18.1554C0 12.7761 1.76971 8.40529 5.30913 5.04317C9.01712 1.68106 13.4835 0 18.7084 0ZM69.2692 0C75.5051 0 80.4771 2.26942 84.1852 6.80827C88.0617 11.179 90 16.9787 90 24.2072C90 33.6212 87.2189 42.4467 81.657 50.684C76.095 58.7529 69.1848 64.8048 60.9261 68.8394L59.4093 65.8134C62.9488 63.1239 66.0666 59.6775 68.7634 55.475C71.4601 51.2722 73.3983 46.061 74.5782 39.8412L69.2692 38.5803C63.3699 37.2355 58.735 34.798 55.3642 31.2677C52.162 27.5694 50.5607 23.1986 50.5607 18.1554C50.5607 12.7761 52.3305 8.40529 55.8697 5.04317C59.5778 1.68106 64.0443 0 69.2692 0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__info">
                                        <h4 class="title">Hilary Ouse</h4>
                                        <span>Lecturer, Oxford university</span>
                                    </div>
                                    <div class="rating testimonial__rating">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="testimonial__content">
                                        <span class="shape">
                                            <svg width="90" height="70" viewBox="0 0 90 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M71.2916 69.1934C65.0555 69.1934 60.0834 66.9239 56.3756 62.3851C52.499 58.0143 50.5607 52.2147 50.5607 44.9861C50.5607 35.5722 53.3415 26.7467 58.9038 18.5093C64.4656 10.4404 71.3759 4.38857 79.6345 0.353981L81.1514 3.37992C77.612 6.06944 74.4939 9.5159 71.7973 13.7184C69.1005 17.9212 67.1623 23.1323 65.9825 29.3521L71.2916 30.6131C77.1906 31.9578 81.8256 34.3954 85.1965 37.9256C88.3988 41.624 90 45.9947 90 51.0379C90 56.4173 88.2303 60.7881 84.6909 64.1502C80.9829 67.5123 76.5165 69.1934 71.2916 69.1934ZM20.7308 69.1934C14.4949 69.1934 9.52288 66.9239 5.81483 62.3851C1.93828 58.0143 0 52.2147 0 44.9861C0 35.5722 2.78111 26.7467 8.34303 18.5093C13.905 10.4404 20.8152 4.38857 29.0739 0.353981L30.5907 3.37992C27.0512 6.06944 23.9334 9.5159 21.2366 13.7184C18.5399 17.9212 16.6017 23.1323 15.4218 29.3521L20.7308 30.6131C26.6301 31.9578 31.265 34.3954 34.6358 37.9256C37.838 41.624 39.4393 45.9947 39.4393 51.0379C39.4393 56.4173 37.6695 60.7881 34.1303 64.1502C30.4222 67.5123 25.9557 69.1934 20.7308 69.1934Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <p>I need to get a certification for English proficiency and Acadia is my best choice. Their tutors are smart and professional when dealing with students. I wanted to place a review since ! Thanks and 5 stars!</p>
                                        <span class="shape shape-two">
                                            <svg width="90" height="69" viewBox="0 0 90 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.7084 0C24.9445 0 29.9166 2.26942 33.6244 6.80827C37.501 11.179 39.4393 16.9787 39.4393 24.2072C39.4393 33.6212 36.6585 42.4467 31.0962 50.684C25.5344 58.7529 18.6241 64.8048 10.3655 68.8394L8.84855 65.8134C12.388 63.1239 15.5061 59.6775 18.2027 55.475C20.8995 51.2722 22.8377 46.061 24.0175 39.8412L18.7084 38.5803C12.8094 37.2355 8.17438 34.798 4.80349 31.2677C1.60117 27.5694 0 23.1986 0 18.1554C0 12.7761 1.76971 8.40529 5.30913 5.04317C9.01712 1.68106 13.4835 0 18.7084 0ZM69.2692 0C75.5051 0 80.4771 2.26942 84.1852 6.80827C88.0617 11.179 90 16.9787 90 24.2072C90 33.6212 87.2189 42.4467 81.657 50.684C76.095 58.7529 69.1848 64.8048 60.9261 68.8394L59.4093 65.8134C62.9488 63.1239 66.0666 59.6775 68.7634 55.475C71.4601 51.2722 73.3983 46.061 74.5782 39.8412L69.2692 38.5803C63.3699 37.2355 58.735 34.798 55.3642 31.2677C52.162 27.5694 50.5607 23.1986 50.5607 18.1554C50.5607 12.7761 52.3305 8.40529 55.8697 5.04317C59.5778 1.68106 64.0443 0 69.2692 0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial__shape">
                <img src="{{Vite::asset('resources/img/images/testimonial_shape.png')}}" srcset="{{Vite::asset('resources/assets/img/images/testimonial_shape.png')}}" alt="shape" data-sal="slide-right" data-sal-duration="700" data-sal-delay="100">
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- product-details-area -->
        <section class="product__details-area section-py-150">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-9">
                        <div class="product__details-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                                    <div class="product__details-img">
                                        <img src="{{Vite::asset('resources/assets/img/product/product_img01.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="tab-pane" id="itemTwo-tab-pane" role="tabpanel" aria-labelledby="itemTwo-tab" tabindex="0">
                                    <div class="product__details-img">
                                        <img src="{{Vite::asset('resources/assets/img/product/product_img02.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="tab-pane" id="itemThree-tab-pane" role="tabpanel" aria-labelledby="itemThree-tab" tabindex="0">
                                    <div class="product__details-img">
                                        <img src="{{Vite::asset('resources/assets/img/product/product_img03.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="tab-pane" id="itemFour-tab-pane" role="tabpanel" aria-labelledby="itemFour-tab" tabindex="0">
                                    <div class="product__details-img">
                                        <img src="{{Vite::asset('resources/assets/img/product/product_img04.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="tab-pane" id="itemFive-tab-pane" role="tabpanel" aria-labelledby="itemFive-tab" tabindex="0">
                                    <div class="product__details-img">
                                        <img src="{{Vite::asset('resources/assets/img/product/product_img05.png')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="product__details-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="itemOne-tab" data-bs-toggle="tab" data-bs-target="#itemOne-tab-pane" type="button" role="tab" aria-controls="itemOne-tab-pane" aria-selected="true">
                                            <img src="{{Vite::asset('resources/assets/img/product/product_img01.png')}}" alt="img">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="itemTwo-tab" data-bs-toggle="tab" data-bs-target="#itemTwo-tab-pane" type="button" role="tab" aria-controls="itemTwo-tab-pane" aria-selected="false">
                                            <img src="{{Vite::asset('resources/assets/img/product/product_img02.png')}}" alt="img">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="itemThree-tab" data-bs-toggle="tab" data-bs-target="#itemThree-tab-pane" type="button" role="tab" aria-controls="itemThree-tab-pane" aria-selected="false">
                                            <img src="{{Vite::asset('resources/assets/img/product/product_img03.png')}}" alt="img">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="itemFour-tab" data-bs-toggle="tab" data-bs-target="#itemFour-tab-pane" type="button" role="tab" aria-controls="itemFour-tab-pane" aria-selected="false">
                                            <img src="{{Vite::asset('resources/assets/img/product/product_img04.png')}}" alt="img">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="itemFive-tab" data-bs-toggle="tab" data-bs-target="#itemFive-tab-pane" type="button" role="tab" aria-controls="itemFive-tab-pane" aria-selected="false">
                                            <img src="{{Vite::asset('resources/assets/img/product/product_img05.png')}}" alt="img">
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product__details-content">
                            <span class="sub-title">Proteins, shots</span>
                            <h4 class="title">Muscle Strength Booster <br> Supplements</h4>
                            <div class="product__details-rating">
                                <div class="rating">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="currentColor" />
                                    </svg>
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.2441 6.91016H19.5098L13.6318 11.1807L15.877 18.0898L9.99902 13.8193L4.12109 18.0898L6.36621 11.1807L0.488281 6.91016H7.75391L9.99902 0L12.2441 6.91016ZM9.99902 12.584L10.5869 13.0107L13.9746 15.4717L12.6807 11.4893L12.4561 10.7988L13.0439 10.3711L16.4316 7.91016H11.5176L11.293 7.21875L9.99902 3.23535V12.584Z" fill="currentColor" />
                                    </svg>
                                    <span>(30)</span>
                                </div>
                                <span class="sold">Sold: <strong>01</strong></span>
                            </div>
                            <h2 class="product__details-price">$310.00 - $401.00</h2>
                            <p>Vitamin D3 supplements are commonly recommended for people at risk for vitamin D deficiency. Low vitamin D levels cause</p>
                            <div class="product__details-list">
                                <ul class="list-wrap">
                                    <li>Type : <span>Supplement</span></li>
                                    <li>XPD : <span>19 Dec 2024</span></li>
                                    <li>CO : <span>Oxinex</span></li>
                                </ul>
                            </div>
                            <div class="product__details-info">
                                <div class="sd-cart-wrap">
                                    <form action="#">
                                        <div class="quickview-cart-plus-minus">
                                            <input type="text" value="1">
                                        </div>
                                    </form>
                                </div>
                                <a href="shop-details.html" class="cart-btn">Add to cart</a>
                            </div>
                            <div class="product__details-list">
                                <ul class="list-wrap">
                                    <li>
                                        Tag:
                                        <a href="#!">Natural,</a>
                                        <a href="#!">vitamin</a>
                                    </li>
                                    <li>XPD : <span>19 Dec 2024</span></li>
                                    <li>
                                        Categories:
                                        <a href="#!">Powder,</a>
                                        <a href="#!">Capsul,</a>
                                        <a href="#!">Vitamin </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- pricing-area -->
        <section id="pricing" class="pricing__area section-py-150 section-bg">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-7 col-lg-6">
                        <div class="section__title mb-60" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <span class="sub-title">OUR PRODUCTS</span>
                            <h2 class="title">OUR PRICING PLANS</h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6" data-sal="slide-up" data-sal-duration="700" data-sal-delay="150">
                        <div class="section__content mb-60">
                            <p>Vitamin D3 supplements are commonly recommended for people at risk for vitamin D deficiency. Low vitamin D levels cause</p>
                        </div>
                    </div>
                </div>
                <div class="row gutter-y-30 justify-content-center">
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                        <div class="pricing__item">
                            <div class="pricing__top">
                                <span class="pricing__plan">BASIC PLAN</span>
                                <h2 class="pricing__price">$64 <span>Per Bottle</span></h2>
                                <div class="pricing__content">
                                    <p>Analyze cash flow, income, expenses, debts assets, liabilities, and financial ratios.</p>
                                </div>
                                <div class="pricing__btn">
                                    <a href="#!" class="tg-btn tg-btn-two">Purchase Now</a>
                                </div>
                            </div>
                            <div class="pricing__list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        02 Person User only
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        60 MG Per Capsule
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        80 Capsules Per Bottle
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        100 Capsules Per Bottle
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="200">
                        <div class="pricing__item active">
                            <div class="pricing__top">
                                <span class="pricing__plan">premium PLAN</span>
                                <h2 class="pricing__price">$84 <span>Per Bottle</span></h2>
                                <div class="pricing__content">
                                    <p>Analyze cash flow, income, expenses, debts assets, liabilities, and financial ratios.</p>
                                </div>
                                <div class="pricing__btn">
                                    <a href="#!" class="tg-btn tg-btn-two">Purchase Now</a>
                                </div>
                            </div>
                            <div class="pricing__list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        02 Person User only
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        60 MG Per Capsule
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        80 Capsules Per Bottle
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        100 Capsules Per Bottle
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="pricing__item">
                            <div class="pricing__top">
                                <span class="pricing__plan">ENTERPRISE PLAN</span>
                                <h2 class="pricing__price">$99 <span>Per Bottle</span></h2>
                                <div class="pricing__content">
                                    <p>Analyze cash flow, income, expenses, debts assets, liabilities, and financial ratios.</p>
                                </div>
                                <div class="pricing__btn">
                                    <a href="#!" class="tg-btn tg-btn-two">Purchase Now</a>
                                </div>
                            </div>
                            <div class="pricing__list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        02 Person User only
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        60 MG Per Capsule
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        80 Capsules Per Bottle
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14Z" fill="currentColor" />
                                                <path d="M10.1824 5.09131L6.24485 9.13409L4.45508 7.29646" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        100 Capsules Per Bottle
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-area-end -->

        <!-- blog-post-area -->
        <section class="blog__post-area section-py-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb-60" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <span class="sub-title">our blog</span>
                            <h2 class="title">read latest post</h2>
                        </div>
                    </div>
                </div>
                <div class="row gutter-y-30">
                    <div class="col-lg-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                        <div class="blog__post-item">
                            <div class="blog__post-thumb">
                                <a href="blog-details.html"><img src="{{Vite::asset('resources/assets/img/blog/blog_img01.jpg')}}" alt="img"></a>
                            </div>
                            <div class="blog__post-content">
                                <div class="blog__post-tag">
                                    <a href="blog.html">Proteins,</a>
                                    <a href="blog.html">shots</a>
                                </div>
                                <h2 class="title"><a href="blog-details.html">How to grow your business with <br> our
                                        collax digital solution.</a></h2>
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="blog-details.html">
                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 14.5V13C13 12.2044 12.6839 11.4413 12.1213 10.8787C11.5587 10.3161 10.7956 10 10 10H4C3.20435 10 2.44129 10.3161 1.87868 10.8787C1.31607 11.4413 1 12.2044 1 13V14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7 7C8.65685 7 10 5.65685 10 4C10 2.34315 8.65685 1 7 1C5.34315 1 4 2.34315 4 4C4 5.65685 5.34315 7 7 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Owen Christ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.5 3.59961V7.49961L10.1 8.79961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Sep 25, 2025
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog__post-btn">
                                    <a href="blog-details-2.html">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 1L11 6L6 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="200">
                        <div class="blog__post-item">
                            <div class="blog__post-thumb">
                                <a href="blog-details.html"><img src="{{Vite::asset('resources/assets/img/blog/blog_img02.jpg')}}" alt="img"></a>
                            </div>
                            <div class="blog__post-content">
                                <div class="blog__post-tag">
                                    <a href="blog.html">Proteins,</a>
                                    <a href="blog.html">shots</a>
                                </div>
                                <h2 class="title"><a href="blog-details.html">How to add a count up animation <br> the webflow site.</a></h2>
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="blog-details.html">
                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 14.5V13C13 12.2044 12.6839 11.4413 12.1213 10.8787C11.5587 10.3161 10.7956 10 10 10H4C3.20435 10 2.44129 10.3161 1.87868 10.8787C1.31607 11.4413 1 12.2044 1 13V14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7 7C8.65685 7 10 5.65685 10 4C10 2.34315 8.65685 1 7 1C5.34315 1 4 2.34315 4 4C4 5.65685 5.34315 7 7 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Owen Christ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.5 3.59961V7.49961L10.1 8.79961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Sep 25, 2025
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog__post-btn">
                                    <a href="blog-details-2.html">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 1L11 6L6 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-post-area-end -->

        <!-- instagram-area -->
        <div class="instagram__area">
            <div class="instagram__active swiper-container" id="instagramSlider" data-swiper-options='{
                "loop": true,
                "speed": 5000,
                "freemode": true,
                "allowTouchMove": false,
                "autoplay": { "delay": 8, "disableOnInteraction": true },
                "breakpoints": {
                    "0": {
                        "spaceBetween": 10,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 10,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 10,
                        "slidesPerView": 2.5
                    },
                    "768": {
                        "spaceBetween": 10,
                        "slidesPerView": 3.5
                    },
                    "992": {
                        "spaceBetween": 10,
                        "slidesPerView": 4
                    },
                    "1400": {
                        "spaceBetween": 10,
                        "slidesPerView": 5
                    }
                }}'>
                <div class="swiper-wrapper slide-transition">
                    <div class="swiper-slide">
                        <div class="instagram__item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{Vite::asset('resources/assets/img/insta/insta_img01.jpg')}}" alt="img">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.9997 10.3703C15.1231 11.2025 14.981 12.0525 14.5935 12.7993C14.206 13.5461 13.5929 14.1517 12.8413 14.53C12.0898 14.9082 11.2382 15.0399 10.4075 14.9062C9.57683 14.7726 8.80947 14.3804 8.21455 13.7855C7.61962 13.1905 7.22744 12.4232 7.09377 11.5925C6.96011 10.7619 7.09177 9.9102 7.47003 9.15868C7.84829 8.40716 8.45389 7.79404 9.20069 7.40654C9.94749 7.01904 10.7975 6.87689 11.6297 7.0003C12.4786 7.12619 13.2646 7.52176 13.8714 8.12861C14.4782 8.73545 14.8738 9.52138 14.9997 10.3703Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 5.5H16.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram__item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{Vite::asset('resources/assets/img/insta/insta_img02.jpg')}}" alt="img">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.9997 10.3703C15.1231 11.2025 14.981 12.0525 14.5935 12.7993C14.206 13.5461 13.5929 14.1517 12.8413 14.53C12.0898 14.9082 11.2382 15.0399 10.4075 14.9062C9.57683 14.7726 8.80947 14.3804 8.21455 13.7855C7.61962 13.1905 7.22744 12.4232 7.09377 11.5925C6.96011 10.7619 7.09177 9.9102 7.47003 9.15868C7.84829 8.40716 8.45389 7.79404 9.20069 7.40654C9.94749 7.01904 10.7975 6.87689 11.6297 7.0003C12.4786 7.12619 13.2646 7.52176 13.8714 8.12861C14.4782 8.73545 14.8738 9.52138 14.9997 10.3703Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 5.5H16.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram__item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{Vite::asset('resources/assets/img/insta/insta_img03.jpg')}}" alt="img">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.9997 10.3703C15.1231 11.2025 14.981 12.0525 14.5935 12.7993C14.206 13.5461 13.5929 14.1517 12.8413 14.53C12.0898 14.9082 11.2382 15.0399 10.4075 14.9062C9.57683 14.7726 8.80947 14.3804 8.21455 13.7855C7.61962 13.1905 7.22744 12.4232 7.09377 11.5925C6.96011 10.7619 7.09177 9.9102 7.47003 9.15868C7.84829 8.40716 8.45389 7.79404 9.20069 7.40654C9.94749 7.01904 10.7975 6.87689 11.6297 7.0003C12.4786 7.12619 13.2646 7.52176 13.8714 8.12861C14.4782 8.73545 14.8738 9.52138 14.9997 10.3703Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 5.5H16.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram__item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{Vite::asset('resources/assets/img/insta/insta_img04.jpg')}}" alt="img">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.9997 10.3703C15.1231 11.2025 14.981 12.0525 14.5935 12.7993C14.206 13.5461 13.5929 14.1517 12.8413 14.53C12.0898 14.9082 11.2382 15.0399 10.4075 14.9062C9.57683 14.7726 8.80947 14.3804 8.21455 13.7855C7.61962 13.1905 7.22744 12.4232 7.09377 11.5925C6.96011 10.7619 7.09177 9.9102 7.47003 9.15868C7.84829 8.40716 8.45389 7.79404 9.20069 7.40654C9.94749 7.01904 10.7975 6.87689 11.6297 7.0003C12.4786 7.12619 13.2646 7.52176 13.8714 8.12861C14.4782 8.73545 14.8738 9.52138 14.9997 10.3703Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 5.5H16.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram__item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{Vite::asset('resources/assets/img/insta/insta_img05.jpg')}}" alt="img">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.9997 10.3703C15.1231 11.2025 14.981 12.0525 14.5935 12.7993C14.206 13.5461 13.5929 14.1517 12.8413 14.53C12.0898 14.9082 11.2382 15.0399 10.4075 14.9062C9.57683 14.7726 8.80947 14.3804 8.21455 13.7855C7.61962 13.1905 7.22744 12.4232 7.09377 11.5925C6.96011 10.7619 7.09177 9.9102 7.47003 9.15868C7.84829 8.40716 8.45389 7.79404 9.20069 7.40654C9.94749 7.01904 10.7975 6.87689 11.6297 7.0003C12.4786 7.12619 13.2646 7.52176 13.8714 8.12861C14.4782 8.73545 14.8738 9.52138 14.9997 10.3703Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 5.5H16.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram__item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{Vite::asset('resources/assets/img/insta/insta_img06.jpg')}}" alt="img">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.9997 10.3703C15.1231 11.2025 14.981 12.0525 14.5935 12.7993C14.206 13.5461 13.5929 14.1517 12.8413 14.53C12.0898 14.9082 11.2382 15.0399 10.4075 14.9062C9.57683 14.7726 8.80947 14.3804 8.21455 13.7855C7.61962 13.1905 7.22744 12.4232 7.09377 11.5925C6.96011 10.7619 7.09177 9.9102 7.47003 9.15868C7.84829 8.40716 8.45389 7.79404 9.20069 7.40654C9.94749 7.01904 10.7975 6.87689 11.6297 7.0003C12.4786 7.12619 13.2646 7.52176 13.8714 8.12861C14.4782 8.73545 14.8738 9.52138 14.9997 10.3703Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 5.5H16.51" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- instagram-area-end -->

        <!-- cta-area -->
        <section class="cta__area cta__bg" data-background="{{Vite::asset('resources/assets/img/bg/cta_bg.svg')}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="cta__content">
                            <h2 class="title">Take the first step toward better health shop our supplements today!</h2>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="cta__btn">
                            <a href="contact.html" class="tg-btn">Contact Now
                                <span>
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.696699C9.46447 0.403806 8.98959 0.403806 8.6967 0.696699C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM0 6V6.75H14V6V5.25H0V6Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-area-end -->

    </main>
    <!-- main-area-end -->

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


<!-- Mirrored from themeadapt.com/tf/oxinex/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Sep 2025 21:11:04 GMT -->

</html>
