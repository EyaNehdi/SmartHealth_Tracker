@extends('shared.layouts.frontoffice')

@section('page-title', 'SmartHealth Tracker - Home')

@section('content')

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
                        <div class="slider__bg" data-background="{{Vite::asset('resources/assets/img/slider/fe.png')}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="slider__content">
                                            
                                        </div>
                                    </div>
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
                        
                    </li>
                    <li>
                       
                    </li>
                    <li>
                        
                    </li>
                    <li>
                       
                    </li>
                </ul>
            </div>
            <div class="section__shape" data-background="{{Vite::asset('resources/assets/img/slider/slider_shape.svg')}}"></div>
        </section>
        <!-- slider-area-end -->





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

@endsection
