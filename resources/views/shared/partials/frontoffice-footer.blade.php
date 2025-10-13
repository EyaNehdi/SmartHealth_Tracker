<footer class="footer">
    <div class="container">
        <div class="row gutter-y-30">
            <div class="col-lg-3 col-6">
                <div class="footer__widget">
                    <div class="footer__logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ Vite::asset('resources/assets/img/images/imagee.png') }}" alt="Logo">
                        </a>
                    </div>
                    <p>SmartHealth Tracker - Your comprehensive health and fitness management solution.</p>
                    <div class="footer__social">
                        <ul class="list-wrap">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 0C4.02948 0 0 4.02948 0 9C0 13.2206 2.90592 16.7623 6.82596 17.735V11.7504H4.97016V9H6.82596V7.81488C6.82596 4.75164 8.21232 3.3318 11.2198 3.3318C11.79 3.3318 12.7739 3.44376 13.1764 3.55536V6.04836C12.964 6.02604 12.595 6.01488 12.1367 6.01488C10.661 6.01488 10.0908 6.57396 10.0908 8.02728V9H13.0306L12.5255 11.7504H10.0908V17.9341C14.5472 17.3959 18.0004 13.6015 18.0004 9C18 4.02948 13.9705 0 9 0Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/" target="_blank">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.7447 1.42792H16.2748L10.7473 7.74554L17.25 16.3424H12.1584L8.17053 11.1284L3.60746 16.3424H1.07582L6.98808 9.58499L0.75 1.42792H5.97083L9.57555 6.19367L13.7447 1.42792ZM12.8567 14.828H14.2587L5.20905 2.86277H3.7046L12.8567 14.828Z" fill="currentColor" />
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
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="footer__widget">
                    <h2 class="footer__widget-title">About Us</h2>
                    <ul class="list-wrap footer__widget-link">
                        <li><a href="{{ route('home') }}">About Company</a></li>
                        <li><a href="{{ route('activities.index') }}">Activities</a></li>
                        <li><a href="{{ route('challenges.index') }}">Challenges</a></li>
                        <li><a href="{{ route('events.front') }}">Events</a></li>
                        <li><a href="{{ route('produits.index') }}">Our Shop</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="footer__widget">
                    <h2 class="footer__widget-title">Support</h2>
                    <ul class="list-wrap footer__widget-link">
                        <li><a href="#help">Knowledge Base</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#api">Developer API</a></li>
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#team">Team</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer__widget">
                    <h2 class="footer__widget-title">news letter</h2>
                    <div class="footer__newsletter">
                        <p>Get everything you need succeed!</p>
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
                        <img src="{{ Vite::asset('resources/assets/img/images/payment.svg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <div class="row aling-items-center">
                <div class="col-lg-5 order-0 order-lg-2">
                    <ul class="footer__bottom-right list-wrap">
                        <li>
                            Need support?
                            <a href="tel:0123456789">+1234 6548 965</a>
                        </li>
                        <li>
                            Customer care
                            <a href="mailto:support@smarthealth.com">support@smarthealth.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="copyright__content">
                        <p>This site is protected by Google <a href="#!">privacy policy</a> and terms of service apply. <br> @2025 SmartHealth Tracker is proudly powered by <a href="https://laravel.com" target="_blank">Laravel</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
