
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
    <header class="transparent-header">
        <div id="header-fixed-height"></div>
        <div id="sticky-header" class="tg-header__area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <div class="logo">
                                    <a href="index-2.html"><img src="{{ Vite::asset('resources/assets/img/logo/logo.svg') }}" alt="Logo"></a>
                                </div>
                                <div class="logo d-none">
                                    <a href="index-2.html"><img src="{{ Vite::asset('resources/assets/img/logo/logo02.svg') }}" alt="Logo"></a>
                                </div>
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li class="menu-item-has-children"><a href="#">Home</a>
                                            <ul class="sub-menu">
                                                <li><a href="index-2.html">Home One</a></li>
                                                <li><a href="index-3.html">Home Two</a></li>
                                                <li><a href="index-4.html">Home Three</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index-2.html#features">Features</a></li>
                                        <li><a href="index-2.html#ingredient">Ingredient</a></li>
                                        <li><a href="index-2.html#products">Products</a></li>
                                        <li class="menu-item-has-children"><a href="#">Shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Shop Page</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="login.html">Login Page</a></li>
                                                <li><a href="register.html">Register Page</a></li>
                                                <li><a href="reset.html">Reset Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index-2.html#pricing">Pricing</a></li>
                                        <li class="menu-item-has-children"><a href="#">News</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Blog Page</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="active"><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="tgmenu__action">
                                    <ul class="list-wrap">
                                        <li class="header-cart">
                                            <a href="shop.html" class="cart-count headerCart__button">
                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.56934 23.1841C11.3819 23.1841 12.8516 24.6539 12.8516 26.4664C12.8516 28.2789 11.3819 29.7486 9.56934 29.7486C7.75685 29.7485 6.28711 28.2789 6.28711 26.4664C6.28717 24.6539 7.75681 23.1842 9.56934 23.1841ZM9.56934 24.8765C8.69132 24.8766 7.97959 25.5884 7.97949 26.4664C7.97949 27.3445 8.69126 28.0562 9.56934 28.0562C10.4475 28.0562 11.1592 27.3445 11.1592 26.4664C11.1591 25.5883 10.4474 24.8765 9.56934 24.8765Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path d="M22.7939 23.1841C24.6065 23.1841 26.0761 24.6539 26.0762 26.4664C26.0762 28.2789 24.6065 29.7486 22.7939 29.7486C20.9815 29.7485 19.5117 28.2789 19.5117 26.4664C19.5118 24.6539 20.9814 23.1842 22.7939 23.1841ZM22.7939 24.8765C21.9159 24.8766 21.2042 25.5884 21.2041 26.4664C21.2041 27.3445 21.9159 28.0562 22.7939 28.0562C23.6721 28.0562 24.3839 27.3445 24.3838 26.4664C24.3837 25.5883 23.672 24.8765 22.7939 24.8765Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path d="M3.0293 0.251127C4.44591 0.266174 5.70009 1.17068 6.16211 2.50992L6.16309 2.51285L6.75488 4.32437L29.3037 4.63589L29.3164 4.63687L29.4092 4.65054C29.6235 4.69181 29.8201 4.8008 29.9688 4.96304L29.9727 4.96695H29.9717C30.1469 5.17194 30.1979 5.45663 30.1035 5.70914L28.4385 12.6857C28.0509 14.3228 26.6751 15.5385 25.0029 15.7228L25.002 15.7238L10.4375 17.2443L10.1982 17.7834L10.1396 17.9767C10.0298 18.4338 10.1066 18.919 10.3584 19.3224C10.6475 19.786 11.1502 20.0733 11.6963 20.0871H25.2295C25.6967 20.0871 26.0762 20.4665 26.0762 20.9337C26.076 21.4008 25.6966 21.7794 25.2295 21.7794H11.6885C10.583 21.7462 9.56304 21.1753 8.95703 20.2502V20.2492C8.34613 19.3086 8.22439 18.1318 8.62988 17.0861L8.63184 17.0802L8.95703 16.3322L4.55566 3.05874V3.05777C4.34236 2.44408 3.79224 2.01522 3.15332 1.95132L3.02441 1.94351H0.696289C0.229145 1.94351 -0.150232 1.56491 -0.150391 1.09781C-0.150391 0.630565 0.229047 0.251127 0.696289 0.251127H3.0293ZM10.4395 15.5168L24.7969 14.0334L24.8008 14.0324C25.7707 13.9553 26.5775 13.2546 26.7891 12.3048V12.3019L28.2402 6.32535L7.30664 6.01773L10.4395 15.5168Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </svg>
                                                <span class="mini-cart-count">2</span>
                                            </a>
                                        </li>
                                        <li class="header-search">
                                            <a href="javascript:void(0)" class="search-open-btn">
                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.25026 6.82723C7.8193 6.39422 7.12009 6.39422 6.68912 6.82723C5.08899 8.43363 4.30252 10.6714 4.53108 12.9673C4.5881 13.5392 5.06804 13.9655 5.62851 13.9655C5.66534 13.9655 5.70246 13.9637 5.73929 13.96C6.34617 13.899 6.78887 13.3555 6.72817 12.7467C6.5655 11.1151 7.12049 9.52869 8.25026 8.39443C8.68158 7.96184 8.68158 7.25983 8.25026 6.82723Z" fill="currentColor" />
                                                    <path d="M12.6229 0C5.66262 0 0 5.68482 0 12.6724C0 19.66 5.66262 25.3448 12.6229 25.3448C19.5832 25.3448 25.2458 19.66 25.2458 12.6724C25.2458 5.68482 19.5832 0 12.6229 0ZM12.6229 23.1281C6.88005 23.1281 2.20812 18.4378 2.20812 12.6724C2.20812 6.90703 6.88005 2.21678 12.6229 2.21678C18.3654 2.21678 23.0377 6.90703 23.0377 12.6724C23.0377 18.4378 18.3658 23.1281 12.6229 23.1281Z" fill="currentColor" />
                                                    <path d="M29.5598 28.108L21.537 20.0538C21.1057 19.6208 20.4071 19.6208 19.9758 20.0538C19.5445 20.4865 19.5445 21.1884 19.9758 21.6211L27.9986 29.6753C28.2143 29.8918 28.4965 30 28.7792 30C29.0618 30 29.3441 29.8918 29.5598 29.6753C29.991 29.2426 29.991 28.5407 29.5598 28.108Z" fill="currentColor" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="header__offCanvas">
                                            <a href="#!" class="navSidebar-button">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.5 12.5254C10.5518 12.5254 11.4713 13.381 11.4746 14.5V21.375C11.4746 22.4262 10.63 23.3496 9.5 23.3496H2.625C1.57313 23.3496 0.653744 22.4934 0.650391 21.375V14.5C0.650391 13.4487 1.49745 12.5254 2.625 12.5254H9.5ZM21.375 12.5254C22.4268 12.5254 23.3463 13.381 23.3496 14.5V21.375C23.3496 22.4262 22.505 23.3496 21.375 23.3496H14.5C13.4481 23.3496 12.5287 22.4934 12.5254 21.375V14.5C12.5254 13.4487 13.3724 12.5254 14.5 12.5254H21.375ZM2.625 13.9746C2.35506 13.9746 2.09961 14.195 2.09961 14.5V21.375C2.09961 21.6459 2.31237 21.9004 2.625 21.9004H9.5C9.77088 21.9004 10.0254 21.6876 10.0254 21.375V14.5C10.0254 14.2285 9.81793 13.9746 9.5 13.9746H2.625ZM14.5 13.9746C14.2301 13.9746 13.9746 14.195 13.9746 14.5V21.375C13.9746 21.6459 14.1874 21.9004 14.5 21.9004H21.375C21.6459 21.9004 21.9004 21.6876 21.9004 21.375V14.5C21.9004 14.2285 21.6929 13.9746 21.375 13.9746H14.5ZM9.5 0.650391C10.5518 0.650391 11.4713 1.506 11.4746 2.625V9.5C11.4746 10.5512 10.63 11.4746 9.5 11.4746H2.625C1.57313 11.4746 0.653744 10.6184 0.650391 9.5V2.625C0.650391 1.57371 1.49745 0.650391 2.625 0.650391H9.5ZM21.375 0.650391C22.4268 0.650391 23.3463 1.506 23.3496 2.625V9.5C23.3496 10.5512 22.505 11.4746 21.375 11.4746H14.5C13.4481 11.4746 12.5287 10.6184 12.5254 9.5V2.625C12.5254 1.57371 13.3724 0.650391 14.5 0.650391H21.375ZM2.625 2.09961C2.35506 2.09961 2.09961 2.32001 2.09961 2.625V9.5C2.09961 9.77088 2.31237 10.0254 2.625 10.0254H9.5C9.77088 10.0254 10.0254 9.81263 10.0254 9.5V2.625C10.0254 2.35346 9.81793 2.09961 9.5 2.09961H2.625ZM14.5 2.09961C14.2301 2.09961 13.9746 2.32001 13.9746 2.625V9.5C13.9746 9.77088 14.1874 10.0254 14.5 10.0254H21.375C21.6459 10.0254 21.9004 9.81263 21.9004 9.5V2.625C21.9004 2.35346 21.6929 2.09961 21.375 2.09961H14.5Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mobile-nav-toggler">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.5 12.5254C10.5518 12.5254 11.4713 13.381 11.4746 14.5V21.375C11.4746 22.4262 10.63 23.3496 9.5 23.3496H2.625C1.57313 23.3496 0.653744 22.4934 0.650391 21.375V14.5C0.650391 13.4487 1.49745 12.5254 2.625 12.5254H9.5ZM21.375 12.5254C22.4268 12.5254 23.3463 13.381 23.3496 14.5V21.375C23.3496 22.4262 22.505 23.3496 21.375 23.3496H14.5C13.4481 23.3496 12.5287 22.4934 12.5254 21.375V14.5C12.5254 13.4487 13.3724 12.5254 14.5 12.5254H21.375ZM2.625 13.9746C2.35506 13.9746 2.09961 14.195 2.09961 14.5V21.375C2.09961 21.6459 2.31237 21.9004 2.625 21.9004H9.5C9.77088 21.9004 10.0254 21.6876 10.0254 21.375V14.5C10.0254 14.2285 9.81793 13.9746 9.5 13.9746H2.625ZM14.5 13.9746C14.2301 13.9746 13.9746 14.195 13.9746 14.5V21.375C13.9746 21.6459 14.1874 21.9004 14.5 21.9004H21.375C21.6459 21.9004 21.9004 21.6876 21.9004 21.375V14.5C21.9004 14.2285 21.6929 13.9746 21.375 13.9746H14.5ZM9.5 0.650391C10.5518 0.650391 11.4713 1.506 11.4746 2.625V9.5C11.4746 10.5512 10.63 11.4746 9.5 11.4746H2.625C1.57313 11.4746 0.653744 10.6184 0.650391 9.5V2.625C0.650391 1.57371 1.49745 0.650391 2.625 0.650391H9.5ZM21.375 0.650391C22.4268 0.650391 23.3463 1.506 23.3496 2.625V9.5C23.3496 10.5512 22.505 11.4746 21.375 11.4746H14.5C13.4481 11.4746 12.5287 10.6184 12.5254 9.5V2.625C12.5254 1.57371 13.3724 0.650391 14.5 0.650391H21.375ZM2.625 2.09961C2.35506 2.09961 2.09961 2.32001 2.09961 2.625V9.5C2.09961 9.77088 2.31237 10.0254 2.625 10.0254H9.5C9.77088 10.0254 10.0254 9.81263 10.0254 9.5V2.625C10.0254 2.35346 9.81793 2.09961 9.5 2.09961H2.625ZM14.5 2.09961C14.2301 2.09961 13.9746 2.32001 13.9746 2.625V9.5C13.9746 9.77088 14.1874 10.0254 14.5 10.0254H21.375C21.6459 10.0254 21.9004 9.81263 21.9004 9.5V2.625C21.9004 2.35346 21.6929 2.09961 21.375 2.09961H14.5Z" fill="currentColor" stroke="currentColor" stroke-width="0.2" />
                                    </svg>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="tgmobile__menu">
            <nav class="tgmobile__menu-box">
                <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                <div class="nav-logo">
                    <a href="index-2.html"><img src="{{ Vite::asset('resources/assets/img/logo/logo02.svg') }}" alt="Logo"></a>
                </div>
                <div class="tgmobile__search">
                    <form action="#">
                        <input type="text" placeholder="Search here...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="tgmobile__menu-outer">
                    <!-- Here Menu Will Come Automatically Via Javascript / Same Menu as in Header -->
                </div>
                <div class="social-links">
                    <ul class="list-wrap">
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
            </nav>
        </div>
        <div class="tgmobile__menu-backdrop"></div>
        <!-- End Mobile Menu -->

        <!-- header-search -->
        <div class="search__popup">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search__wrapper">
                            <div class="search__close">
                                <button type="button" class="search-close-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="search__form">
                                <form action="#">
                                    <div class="search__input">
                                        <input class="search-input-field" type="text" placeholder="Type keywords here">
                                        <span class="search-focus-border"></span>
                                        <button>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-popup-overlay"></div>
        <!-- header-search-end -->

        <!-- offCanvas-start -->
        <div class="offCanvas-wrap">
            <div class="offCanvas-toggle"><img src="{{ Vite::asset('resources/assets/img/icons/close.png') }}" alt="icon"></div>
            <div class="offCanvas-body">
                <div class="offCanvas-content">
                    <h3 class="title">Getting all of the <span>Nutrients</span> you need simply cannot be done without supplements.</h3>
                    <p>Nam libero tempore, cum soluta nobis eligendi cumque quod placeat facere possimus assumenda omnis dolor repellendu sautem temporibus officiis</p>
                </div>
                <div class="offcanvas-contact">
                    <h4 class="number">+1 599 162 4545</h4>
                    <h4 class="email">Oxinex@gmail.com</h4>
                    <p>5689 Lotaso Terrace, Culver City, <br> CA, United States</p>
                    <ul class="offcanvas-social list-wrap">
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
            </div>
        </div>
        <div class="offCanvas-overlay"></div>
        <!-- offCanvas-end -->

        <!-- mini-cart-area -->
        <div class="mini__cart-wrap">
            <div class="mini__cart-toggle"><img src="{{ Vite::asset('resources/assets/img/icons/close.png') }}" alt="icon"></div>
            <div class="mini__cart-top">
                <h4 class="mini__cart-title">Shopping cart</h4>
                <div class="mini__cart-shop">
                    <p>Free Shipping for all orders over <span>$500</span></p>
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
                    </div>
                </div>
                <div class="mini__cart-widget">
                    <div class="mini__cart-item">
                        <div class="thumb">
                            <img src="{{ Vite::asset('resources/assets/img/product/product_img01.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="shop-details.html">Box full of muscle</a></h6>
                            <p>$450.00 <span>x1</span></p>
                        </div>
                        <div class="mini__cart-delete">
                            <img src="{{ Vite::asset('resources/assets/img/icons/close.png') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mini__cart-checkout">
                <h4 class="title">Subtotal: <span>$113.00</span></h4>
                <div class="mini__cart-checkout-btn">
                    <a href="cart.html" class="tg-btn tg-btn-three">view cart</a>
                    <a href="checkout.html" class="tg-btn tg-btn-three">checkout</a>
                </div>
            </div>
        </div>
        <div class="headerCart__overlay"></div>
        <!-- mini-cart-area-end -->

    </header>
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
                                <label for="categorie_activity_id" class="form-label">Catégorie</label>
                                <select name="categorie_activity_id" id="categorie_activity_id" class="form-control @error('categorie_activity_id') is-invalid @enderror">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('categorie_activity_id', $activity->categorie_activity_id) == $category->id ? 'selected' : '' }}>{{ $category->nom }}</option>
                                    @endforeach
                                </select>
                                @error('categorie_activity_id')
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
<footer class="footer__area footer__bg" data-background="{{ Vite::asset('resources/assets/img/bg/footer_bg.jpg') }}">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__widget">
                        <div class="footer__logo">
                            <a href="index-2.html"><img src="{{ Vite::asset('resources/assets/img/logo/logo.svg') }}" alt="logo"></a>
                        </div>
                        <div class="footer__content">
                            <p>A new way to make the payments easy, reliable and 100% secure.</p>
                        </div>
                        <ul class="list-wrap footer__social">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.88265 13.9168H4.70664V6.95842H7.26587L7.53062 4.56646H4.70664V3.37048C4.70664 3.00807 4.76547 2.75437 4.88313 2.60941C5.0008 2.46444 5.28516 2.39196 5.73621 2.39196H7.53062V0H4.94197C3.76531 0 2.96126 0.262753 2.52982 0.788258C2.09838 1.29564 1.88265 2.0839 1.88265 3.15303V4.56646H0V6.95842H1.88265V13.9168Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/home" target="_blank">
                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.603 0.21745C13.0385 0.543626 12.4285 0.770137 11.7729 0.896983C11.2084 0.298994 10.5073 0 9.66961 0C8.88658 0 8.2128 0.280874 7.64828 0.842621C7.08377 1.40437 6.80151 2.07484 6.80151 2.85404C6.80151 3.07149 6.82882 3.28894 6.88345 3.50639C5.718 3.45203 4.61629 3.16209 3.5783 2.63659C2.55853 2.11108 1.69355 1.40437 0.983351 0.516445C0.710198 0.951346 0.573621 1.43155 0.573621 1.95705C0.573621 2.97182 1.00156 3.76008 1.85744 4.32183C1.40219 4.32183 0.974246 4.20404 0.573621 3.96847V4.02283C0.573621 4.69331 0.783038 5.2913 1.20187 5.8168C1.63892 6.34231 2.19433 6.67754 2.86811 6.82251C2.61316 6.87687 2.35822 6.90405 2.10328 6.90405C1.92118 6.90405 1.73907 6.88593 1.55697 6.84969C1.75728 7.42956 2.09417 7.90976 2.56764 8.2903C3.05931 8.65272 3.61472 8.83393 4.23387 8.83393C3.19589 9.64937 2.01223 10.0571 0.682882 10.0571C0.46436 10.0571 0.236733 10.048 0 10.0299C1.34755 10.8816 2.81348 11.3074 4.39776 11.3074C5.67248 11.3074 6.83793 11.0628 7.89412 10.5735C8.95031 10.0843 9.80619 9.45004 10.4618 8.67084C11.1355 7.87352 11.6545 7.00372 12.0187 6.06143C12.3829 5.10103 12.565 4.14062 12.565 3.18021C12.565 3.05337 12.565 2.93558 12.565 2.82686C13.1296 2.41008 13.603 1.91175 13.9854 1.33188C13.4573 1.56746 12.911 1.72148 12.3465 1.79397C12.9657 1.41343 13.3845 0.887923 13.603 0.21745Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.0292664 3.2H2.80957V12H0.0292664V3.2ZM8.51652 3.2C8.37994 3.2 8.24337 3.20833 8.10679 3.225C7.98972 3.24167 7.87266 3.26667 7.75559 3.3C7.63853 3.33333 7.54097 3.36667 7.46293 3.4C7.38489 3.41667 7.28733 3.45833 7.17027 3.525C7.0532 3.575 6.97516 3.60833 6.93613 3.625C6.91662 3.64167 6.84834 3.69167 6.73127 3.775C6.6142 3.85833 6.55567 3.9 6.55567 3.9V3.2H3.77536V12H6.55567V6.45C6.55567 6.43333 6.55567 6.4 6.55567 6.35C6.55567 6.3 6.57518 6.20833 6.6142 6.075C6.67274 5.94167 6.74102 5.83333 6.81907 5.75C6.91662 5.65 7.06296 5.55833 7.25806 5.475C7.47268 5.39167 7.71657 5.35 7.98972 5.35C8.45799 5.35 8.79943 5.45 9.01405 5.65C9.24818 5.85 9.36524 6.11667 9.36524 6.45V12H12.3211V6.55C12.3211 5.96667 12.2138 5.46667 11.9992 5.05C11.7846 4.61667 11.531 4.29167 11.2383 4.075C10.9651 3.84167 10.6335 3.65833 10.2432 3.525C9.87253 3.375 9.5506 3.28333 9.27745 3.25C9.0238 3.21667 8.77016 3.2 8.51652 3.2ZM0.409729 0.35C0.136576 0.583333 0 0.866667 0 1.2C0 1.53333 0.136576 1.81667 0.409729 2.05C0.682882 2.28333 1.01457 2.4 1.40479 2.4C1.79501 2.4 2.12669 2.28333 2.39984 2.05C2.673 1.81667 2.80957 1.53333 2.80957 1.2C2.80957 0.866667 2.673 0.583333 2.39984 0.35C2.12669 0.116667 1.79501 0 1.40479 0C1.01457 0 0.682882 0.116667 0.409729 0.35Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.46586 3.0643C7.93982 2.77825 8.34607 2.69411 8.68461 2.8119C9.02315 2.92969 9.20935 3.17367 9.2432 3.54385C9.29398 3.91404 9.20089 4.34311 8.96391 4.83108C8.13448 6.37912 7.53357 7.15314 7.16117 7.15314C6.9919 7.15314 6.83109 6.95964 6.67875 6.57263C6.52641 6.16879 6.33174 5.50414 6.09477 4.57868C6.04398 4.32629 5.97628 3.94769 5.89164 3.44289C5.80701 2.9381 5.72237 2.50902 5.63773 2.15566C5.57003 1.80231 5.46846 1.44054 5.33305 1.07035C5.19763 0.70017 5.00297 0.439359 4.74906 0.287921C4.51208 0.119655 4.22432 0.0691757 3.88578 0.136482C3.3949 0.237441 2.82784 0.540318 2.18461 1.04511C1.54138 1.53308 1.00818 1.99581 0.585 2.4333C0.17875 2.85397 -0.0159115 3.07271 0.00101563 3.08954L0.534219 3.77101C0.568073 3.75418 0.601927 3.72895 0.635781 3.69529C0.686562 3.66164 0.779661 3.60275 0.915078 3.51861C1.06742 3.43448 1.20284 3.36717 1.32133 3.3167C1.43982 3.26622 1.55831 3.24098 1.6768 3.24098C1.81221 3.24098 1.91378 3.28304 1.98148 3.36717C2.1169 3.51861 2.48083 4.57027 3.07328 6.52215C3.68266 8.47403 4.05505 9.59299 4.19047 9.87904C4.34281 10.1987 4.54594 10.4848 4.79984 10.7372C5.07068 10.9728 5.39229 11.1494 5.76469 11.2672C6.13708 11.385 6.52641 11.3093 6.93266 11.0401C7.30505 10.7877 7.76208 10.4259 8.30375 9.95476C8.84542 9.46679 9.44633 8.86104 10.1065 8.1375C10.7666 7.41395 11.3591 6.57263 11.8838 5.61352C12.4086 4.63758 12.7556 3.67847 12.9248 2.73618C13.1618 1.40688 12.8148 0.557145 11.8838 0.186961C11.0713 -0.149569 10.1827 -0.0317834 9.21781 0.540318C8.21911 1.12925 7.63513 1.97057 7.46586 3.0643Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="footer__widget">
                        <h2 class="footer__widget-title">About Us</h2>
                        <ul class="list-wrap footer__widget-link">
                            <li><a href="contact.html">About Company</a></li>
                            <li><a href="contact.html">Affiliate Program</a></li>
                            <li><a href="contact.html">Customer Spotlight</a></li>
                            <li><a href="contact.html">Reseller Program</a></li>
                            <li><a href="shop.html">Our Shop</a></li>
                            <li><a href="contact.html">Price & Plans</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="footer__widget">
                        <h2 class="footer__widget-title">Support</h2>
                        <ul class="list-wrap footer__widget-link">
                            <li><a href="contact.html">Knowledge Base</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Developer API</a></li>
                            <li><a href="contact.html">FAQ</a></li>
                            <li><a href="contact.html">Team</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <h2 class="footer__widget-title">Newsletter</h2>
                        <div class="footer__newsletter">
                            <p>Get everything you need to succeed!</p>
                            <form action="#" class="footer__newsletter-form">
                                <input type="text" placeholder="Enter your email">
                                <button type="submit">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13 5.39844L10.496 7.39844C9.672 8.05444 8.32 8.05444 7.496 7.39844L5 5.39844" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="footer__payment">
                            <img src="{{ Vite::asset('resources/assets/img/images/payment.svg') }}" alt="payment methods">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-0 order-lg-2">
                    <ul class="footer__bottom-right list-wrap">
                        <li>
                            Need support?
                            <a href="tel:0123456789">+1234 6548 965</a>
                        </li>
                        <li>
                            Customer care
                            <a href="mailto:oxinex@gmail.com">themeadapt@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="copyright__content">
                        <p>This site is protected by Google <a href="#!">privacy policy</a> and terms of service apply. <br> @2025 Oxinex is proudly powered by <a href="https://themeforest.net/user/themeadapt" target="_blank">Themeadapt</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
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