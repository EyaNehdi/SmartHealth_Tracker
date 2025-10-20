<header class="transparent-header">
    <div id="header-fixed-height"></div>
    <div id="sticky-header" class="tg-header__area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ Vite::asset('resources/assets/img/images/imagee.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="logo d-none">
                                <a href="{{ route('home') }}">
                                    <img src="{{ Vite::asset('resources/assets/img/images/logo02.svg') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li><a href="{{ route('home') }}" class="section-link">Home</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Objectifs</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('challenges.index') }}">Tous les objectifs</a></li>
                                            <li><a href="{{ route('challenges.create') }}">notre objectif/ajouter</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#ingredient" class="section-link">Magasin</a></li>
                                    <li><a href="activities/front" class="section-link">Activities</a></li>
                                    <li><a href="{{ route('produits.index') }}" class="section-link">Magasin</a></li>
                                    <li><a href="{{ route('events.front') }}" class="section-link">Event</a></li>
                                </ul>
                            </div>
                            <div class="tgmenu__action">
                                <ul class="list-wrap">
                                    <li class="header-cart">
                                        <a href="shop.html" class="cart-count headerCart__button">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 14.5V18C3 18.5523 3.44772 19 4 19H5.5V11L4.5 11.5C3.67157 11.5 3 12.1716 3 13V14.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.5 11V7C5.5 6.17157 6.17157 5.5 7 5.5C7.82843 5.5 8.5 6.17157 8.5 7V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10 15V19C10 19.5523 10.4477 20 11 20H13C13.5523 20 14 19.5523 14 19V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10 15V4C10 3.17157 10.6716 2.5 11.5 2.5C12.3284 2.5 13 3.17157 13 4V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13 8V5C13 4.17157 13.6716 3.5 14.5 3.5C15.3284 3.5 16 4.17157 16 5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.5 12V19C18.5 19.5523 18.9477 20 19.5 20H20.5C21.0523 20 21.5 19.5523 21.5 19V14C21.5 12.8954 20.6046 12 19.5 12H18.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.5 12V6.5C18.5 5.67157 17.8284 5 17 5C16.1716 5 15.5 5.67157 15.5 6.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                    @auth
                                    <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 12c2.7614 0 5-2.2386 5-5s-2.2386-5-5-5-5 2.2386-5 5 2.2386 5 5 5zm0 2c-3.866 0-7 2.0147-7 4.5V21h14v-2.5c0-2.4853-3.134-4.5-7-4.5z" fill="currentColor" />
                                        </svg>
                                    </a>
                                    @else
                                    <li>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </li>
                                    @endauth
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

        <!-- Mobile Menu  -->
        <div class="tgmobile__menu">
            <nav class="tgmobile__menu-box">
                <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                <div class="nav-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ Vite::asset('resources/assets/img/images/imagee.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="tgmobile__search">
                    <form action="#">
                        <input type="text" placeholder="Search here...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="tgmobile__menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
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
                                    <path d="M9 0C4.02948 0 0 4.02948 0 9C0 13.2206 2.90592 16.7623 6.82596 17.735V11.7504H4.97016V9H6.82596V7.81488C6.82596 4.75164 8.21232 3.3318 11.2198 3.3318C11.79 3.3318 12.7739 3.44376 13.1764 3.55536V6.04836C12.964 6.02604 12.595 6.01488 12.1367 6.01488C10.661 6.01488 10.0908 6.57396 10.0908 8.02728V9H13.0306L12.5255 11.7504H10.0908V17.9341C14.5472 17.3959 18.0004 13.6015 18.0004 9C18 4.02948 13.9705 0 9 0Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Mobile Menu end -->
    </div>
</header>