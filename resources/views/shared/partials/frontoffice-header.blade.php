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
                                            <li><a href="{{ route('groups.index') }}">notre groupes</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('produits.index') }}" class="section-link">Magasin</a></li>

                                    <li><a href="{{ route('activities.index') }}" class="section-link">Activities</a></li>

                                    <li><a href="{{ route('events.front') }}" class="section-link">Event</a></li>
                                    <li><a href="{{ route('contact') }}" class="section-link">CONTACT</a></li>
                                </ul>
                            </div>
                            <div class="tgmenu__action">
                                <ul class="list-wrap">
                                    @auth
                                     <li class="header-shop-panier position-relative">
    <a href="javascript:void(0)" class="shop-panier-toggle">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 6H21L19 14H7L6 6Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="9" cy="20" r="1" fill="#fff"/>
            <circle cx="18" cy="20" r="1" fill="#fff"/>
        </svg>
        {{-- <span class="shop-panier-count">0</span> --}}
    </a>

    <!-- Mini-panier global -->
    <div class="shop-mini-panier">
        <div class="mini-panier-header">
            <h4>Votre panier</h4>
            <button class="mini-panier-close">&times;</button>
        </div>
        <div class="mini-panier-body">
            <ul class="mini-panier-items">
                <!-- Items injectés via JS -->
            </ul>
        </div>
        <div class="mini-panier-footer">
            <p>Total: <span class="mini-panier-total">0 DT</span></p>
        </div>
    </div>
</li>

<div class="shop-mini-panier-overlay"></div>
<script>
window.routes = {
    panierGet: "{{ route('panier.get') }}",
    panierAdd: "{{ route('panier.add') }}",
    panierUpdate: "{{ route('panier.update') }}",
    panierRemove: "{{ route('panier.remove') }}"
};
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const panierToggle = document.querySelector('.shop-panier-toggle');
    const miniPanier = document.querySelector('.shop-mini-panier');
    const closeBtn = document.querySelector('.mini-panier-close');
    const overlay = document.querySelector('.shop-mini-panier-overlay');
    const listEl = miniPanier.querySelector('.mini-panier-items');
    const totalEl = miniPanier.querySelector('.mini-panier-total');
    const countEl = document.querySelector('.shop-panier-count');

    // Affichage du mini-panier
    function togglePanier() {
        miniPanier.classList.toggle('active');
        overlay.classList.toggle('active');
    }
    function closePanier() {
        miniPanier.classList.remove('active');
        overlay.classList.remove('active');
    }
    panierToggle.addEventListener('click', togglePanier);
    closeBtn.addEventListener('click', closePanier);
    overlay.addEventListener('click', closePanier);

    // Conversion en tableau si backend renvoie un objet
    function normalizePanier(p) {
        if (!p) return [];
        return Array.isArray(p) ? p : Object.values(p);
    }

    // Échappement HTML pour éviter injection
    function escapeHtml(text) {
        return String(text)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    // Rendu du panier
    function renderPanier(panier) {
       panier = normalizePanier(panier).filter(item => item.id !== undefined && item.id !== null && item.id !== '');
        listEl.innerHTML = '';
        let total = 0;

        panier.forEach(item => {
            const prix = parseFloat(item.prix) || 0;
            const qty = parseInt(item.qty) || 1;
            total += prix * qty;

            const li = document.createElement('li');
            li.dataset.itemId = item.id;

            li.innerHTML = `
                <div style="display:flex; align-items:center; gap:10px;">
                    <img src="${item.image ?? ''}" width="50" style="border-radius:5px; object-fit:cover;">
                    <div style="flex:1">
                        <span class="item-nom">${escapeHtml(item.nom ?? '')}</span><br>
                        <small>${prix.toFixed(2)} DT</small>
                        <div style="margin-top:6px;">
                            <button class="qty-decrease btn-qty" data-id="${item.id}">-</button>
                            <span class="qty">${qty}</span>
                            <button class="qty-increase btn-qty" data-id="${item.id}">+</button>
                        </div>
                    </div>
                    <button class="remove-item btn btn-sm btn-danger" data-id="${item.id}">&times;</button>
                </div>
            `;
            listEl.appendChild(li);
        });

        totalEl.textContent = total.toFixed(2) + ' DT';
        if (countEl) countEl.textContent = panier.length;
    }

    // Chargement du panier depuis backend
    async function updatePanier() {
        try {
            const res = await fetch(window.routes.panierGet, { credentials: 'same-origin' });
            if (!res.ok) throw new Error('HTTP ' + res.status);
            const panier = await res.json();
            renderPanier(panier);
        } catch (err) {
            console.error('Erreur récupération panier :', err);
        }
    }

    // Modifier la quantité
    async function changeQty(id, delta) {
        try {
            const resGet = await fetch(window.routes.panierGet, { credentials: 'same-origin' });
            const panier = await resGet.json();
            const normalized = normalizePanier(panier);
            const item = normalized.find(i => String(i.id) === String(id));
            if (!item) return;

            const newQty = Math.max(1, (parseInt(item.qty) || 1) + delta);
            const payload = { id: id, qty: newQty };

            const res = await fetch(window.routes.panierUpdate, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify(payload)
            });

            if (!res.ok) throw new Error('HTTP ' + res.status);
            const updated = await res.json();
            renderPanier(updated);
        } catch (err) {
            console.error('Erreur update qty :', err);
        }
    }

    // Supprimer un item
    async function removeItem(id) {
        try {
            const payload = { id: id };
            const res = await fetch(window.routes.panierRemove, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify(payload)
            });

            if (!res.ok) throw new Error('HTTP ' + res.status);
            const updated = await res.json();
            renderPanier(updated);
        } catch (err) {
            console.error('Erreur suppression item :', err);
        }
    }

    // **Event delegation** pour tous les boutons
    listEl.addEventListener('click', (e) => {
        const target = e.target;
        const id = target.dataset.id;
        if (!id) return;

        if (target.classList.contains('qty-increase')) {
            changeQty(id, +1);
        } else if (target.classList.contains('qty-decrease')) {
            changeQty(id, -1);
        } else if (target.classList.contains('remove-item')) {
            removeItem(id);
        }
    });

    // Initial load
    updatePanier();

    // Optionnel : écouter les changements cross-tab
    window.addEventListener('storage', updatePanier);
});
</script>





<style>
.header-shop-panier {
    position: relative; /* Nécessaire pour le dropdown */
}

.shop-panier-toggle svg path,
.shop-panier-toggle svg circle {
    stroke: #fff;
    fill: #fff;
}

/* Mini-panier dropdown */
.shop-mini-panier, .shop-mini-panier-principal {
    position: absolute;
    top: 120%;   /* juste en dessous de l’icône */
    right: 0;
    width: 280px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.3s ease;
    z-index: 9999;
    display: flex;
    flex-direction: column;
}

/* Actif */
.shop-mini-panier.active, .shop-mini-panier-principal.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* Header */
.mini-panier-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
}

.mini-panier-header h4 {
    margin: 0;
    font-size: 16px;
}

/* Close button */
.mini-panier-close {
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
}

/* Body with scroll */
.mini-panier-body {
    max-height: 200px;
    overflow-y: auto;
}

.mini-panier-items {
    list-style: none;
    padding: 10px 15px;
    margin: 0;
}

.mini-panier-items li {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
    border-bottom: 1px solid #f1f1f1;
}

/* Footer */
.mini-panier-footer {
    padding: 10px 15px;
    border-top: 1px solid #eee;
}

.mini-panier-footer p {
    margin: 0 0 5px;
    font-weight: bold;
}

.mini-panier-footer .btn {
    display: block;
    text-align: center;
    padding: 8px 0;
    border-radius: 5px;
    font-size: 14px;
}
</style>
{{-- end js et css --}}
                                    <li class="header-cart">
                                        <a href="javascript:void(0)" class="cart-count headerCart__button">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 14.5V18C3 18.5523 3.44772 19 4 19H5.5V11L4.5 11.5C3.67157 11.5 3 12.1716 3 13V14.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.5 11V7C5.5 6.17157 6.17157 5.5 7 5.5C7.82843 5.5 8.5 6.17157 8.5 7V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10 15V19C10 19.5523 10.4477 20 11 20H13C13.5523 20 14 19.5523 14 19V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10 15V4C10 3.17157 10.6716 2.5 11.5 2.5C12.3284 2.5 13 3.17157 13 4V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13 8V5C13 4.17157 13.6716 3.5 14.5 3.5C15.3284 3.5 16 4.17157 16 5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.5 12V19C18.5 19.5523 18.9477 20 19.5 20H20.5C21.0523 20 21.5 19.5523 21.5 19V14C21.5 12.8954 20.6046 12 19.5 12H18.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.5 12V6.5C18.5 5.67157 17.8284 5 17 5C16.1716 5 15.5 5.67157 15.5 6.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="mini-cart-count" id="participation-count">{{ auth()->user()->participations()->count() }}</span>
                                        </a>
                                    </li>
                                    @endauth
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

    <!-- mini-cart-area -->
    @auth
    <div class="mini__cart-wrap">
        <div class="mini__cart-toggle"><img src="{{ Vite::asset('resources/assets/img/icons/close.png') }}" alt="icon"></div>
        <div class="mini__cart-top">
            <h4 class="mini__cart-title">notre participation</h4>
            <div class="mini__cart-widget">
                @php
                    $userParticipations = auth()->user()->participations()->with(['challenge', 'challenge.creator'])->get();
                @endphp

                @forelse($userParticipations as $p)
                <div class="mini__cart-item">
                    <div class="thumb">
                        @if ($p->image)
                            <img src="{{ asset('storage/' . $p->image) }}" alt="img">
                        @else
                            <img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}" alt="img">
                        @endif
                    </div>
                    <div class="content">
                        <h6 class="title">{{ $p->challenge->titre }}</h6>
                        <!-- Participant comment -->
                        <p><strong>You:</strong> {{ $p->comment ?? '-' }}</p>
                        <!-- Owner reply -->
                        @if ($p->reply)
                            <p><strong>Owner:</strong> {{ $p->reply }}</p>
                        @endif
                        <!-- Display existing participant reply -->
                        @if ($p->participant_reply)
                            <small class="text-muted d-block mt-1"><strong>You replied:</strong><br> {{ $p->participant_reply }}</small>
                        @endif
                        <!-- Participant reply to owner -->
                        @if ($p->reply && !$p->participant_reply)
                            <form action="{{ route('participation.participant_reply', $p->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('PUT')
                                <input type="text" name="participant_reply" placeholder="Reply to owner..." class="form-control mb-1">
                                <button type="submit" class="btn btn-sm btn-primary">Send</button>
                            </form>
                        @endif
                    </div>
                    <div class="mini__cart-delete">
                        <img src="{{ Vite::asset('resources/assets/img/icons/close.png') }}" alt="icon">
                    </div>
                </div>
                @empty
                <p>No participations yet.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="headerCart__overlay"></div>
    @endauth
    <!-- mini-cart-area-end -->
</header>

@push('frontoffice-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle mini-cart functionality
    const headerCartButton = document.querySelector('.headerCart__button');
    const miniCartWrap = document.querySelector('.mini__cart-wrap');
    const miniCartToggle = document.querySelector('.mini__cart-toggle');
    const headerCartOverlay = document.querySelector('.headerCart__overlay');
    const participationCount = document.getElementById('participation-count');

    // Open mini-cart when clicking the cart button
    if (headerCartButton && miniCartWrap) {
        headerCartButton.addEventListener('click', function(e) {
            e.preventDefault();
            miniCartWrap.classList.add('active');
            document.body.classList.add('cart-open');
        });
    }

    // Close mini-cart when clicking the toggle button
    if (miniCartToggle && miniCartWrap) {
        miniCartToggle.addEventListener('click', function() {
            miniCartWrap.classList.remove('active');
            document.body.classList.remove('cart-open');
        });
    }

    // Close mini-cart when clicking the overlay
    if (headerCartOverlay && miniCartWrap) {
        headerCartOverlay.addEventListener('click', function() {
            miniCartWrap.classList.remove('active');
            document.body.classList.remove('cart-open');
        });
    }

    // Handle participant reply form submissions
    const replyForms = miniCartWrap ? miniCartWrap.querySelectorAll('form[action*="participant_reply"]') : [];
    replyForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;

            // Disable button and show loading
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    const successAlert = document.createElement('div');
                    successAlert.className = 'alert alert-success alert-dismissible fade show';
                    successAlert.innerHTML = `
                        <strong>Success!</strong> Your reply has been sent.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;

                    // Insert before the form
                    this.parentNode.insertBefore(successAlert, this);

                    // Hide the form since reply was sent
                    this.style.display = 'none';

                    // Add the reply to the display
                    const replyDiv = document.createElement('div');
                    replyDiv.className = 'mt-1';
                    replyDiv.innerHTML = `
                        <small class="text-muted d-block"><strong>You replied:</strong><br> ${formData.get('participant_reply')}</small>
                    `;
                    this.parentNode.appendChild(replyDiv);

                    // Update participation count
                    if (participationCount) {
                        const currentCount = parseInt(participationCount.textContent) || 0;
                        participationCount.textContent = currentCount;
                    }
                } else {
                    throw new Error(data.message || 'Error sending reply');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error sending your reply. Please try again.');
            })
            .finally(() => {
                // Re-enable button
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            });
        });
    });
});
</script>
@endpush
