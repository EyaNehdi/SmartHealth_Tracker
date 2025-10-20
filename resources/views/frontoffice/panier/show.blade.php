{{-- resources/views/frontoffice/panier/show.blade.php --}}
@extends('shared.layouts.frontoffice')

@section('page-title', 'Mon Panier - SmartHealth Tracker')

@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb__content text-center">
                        <h2 class="title">Mon Panier</h2>
                        <nav class="breadcrumb">
                            <span><a href="{{ route('home') }}">Home</a></span>
                            <span class="breadcrumb-separator">|</span>
                            <span>Panier</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- panier-area -->
    <section class="products-area section-py-150">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <a href="{{ route('produits.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>
                        Retour à la boutique
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-4">
                                <i class="fas fa-shopping-cart me-2 text-primary"></i>Votre Panier
                            </h3>

                            <div id="panier-container">
                                <!-- Panier injecté dynamiquement -->
                            </div>

                            <!-- Zone Total -->
                            <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                                <h5 class="fw-bold mb-0">Total :</h5>
                                <h5 class="fw-bold text-primary mb-0"><span id="panier-total">0.00</span> DT</h5>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-end mt-4 gap-3">
                                <button id="checkout-button" class="btn btn-primary">
                                    <i class="fas fa-credit-card me-2"></i>Payer maintenant
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- panier-area-end -->

</main>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const panierContainer = document.getElementById('panier-container');
    const panierTotal = document.getElementById('panier-total');

    async function fetchPanier() {
        const res = await fetch('{{ route("panier.get") }}');
        const panier = await res.json();
        renderPanier(panier);
    }

    function renderPanier(panier) {
        panierContainer.innerHTML = '';
        let total = 0;

        if (!panier || panier.length === 0) {
            panierContainer.innerHTML = `
                <div class="text-center py-5">
                    <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Votre panier est vide.</h5>
                </div>
            `;
            panierTotal.textContent = "0.00";
            return;
        }

        const table = document.createElement('table');
        table.classList.add('table', 'align-middle', 'table-hover');

        table.innerHTML = `
            <thead class="table-light">
                <tr>
                    <th>Produit</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">Quantité</th>
                    <th class="text-center">Sous-total</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                ${panier.map(item => {
                    const sousTotal = item.prix * item.qty;
                    total += sousTotal;
                    return `
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="${item.image}" width="70" height="70" class="rounded me-3 shadow-sm">
                                    <div>
                                        <strong>${item.nom}</strong><br>
                                        <small class="text-muted">#${item.id}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">${item.prix.toFixed(2)} DT</td>
                            <td class="text-center">
                                <div class="d-inline-flex align-items-center border rounded">
                                    <button class="btn btn-sm btn-light qty-decrease" data-id="${item.id}">-</button>
                                    <span class="px-3">${item.qty}</span>
                                    <button class="btn btn-sm btn-light qty-increase" data-id="${item.id}">+</button>
                                </div>
                            </td>
                            <td class="text-center fw-bold">${sousTotal.toFixed(2)} DT</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-danger remove-item" data-id="${item.id}">Supprimer</button>
                            </td>
                        </tr>
                    `;
                }).join('')}
            </tbody>
        `;
        panierContainer.appendChild(table);
        panierTotal.textContent = total.toFixed(2);

        // Actions
        document.querySelectorAll('.qty-increase').forEach(btn => btn.addEventListener('click', () => updateQty(btn.dataset.id, 1)));
        document.querySelectorAll('.qty-decrease').forEach(btn => btn.addEventListener('click', () => updateQty(btn.dataset.id, -1)));
        document.querySelectorAll('.remove-item').forEach(btn => btn.addEventListener('click', () => removeItem(btn.dataset.id)));
    }

    async function updateQty(id, change) {
        const resGet = await fetch('{{ route("panier.get") }}');
        const panier = await resGet.json();
        const item = panier.find(i => i.id == id);
        if (!item) return;
        const newQty = Math.max(1, item.qty + change);

        const resUpdate = await fetch('{{ route("panier.update") }}', {
            method: 'POST',
            headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
            body: JSON.stringify({id: id, qty: newQty})
        });
        const updatedPanier = await resUpdate.json();
        renderPanier(updatedPanier);
    }

    async function removeItem(id) {
        const res = await fetch('{{ route("panier.remove") }}', {
            method: 'POST',
            headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
            body: JSON.stringify({id: id})
        });
        const updatedPanier = await res.json();
        renderPanier(updatedPanier);
        Swal.fire({icon:'success', title:'Produit supprimé', toast:true, position:'top-end', showConfirmButton:false, timer:1000});
    }

    fetchPanier();

    // Stripe Checkout
    const checkoutBtn = document.getElementById('checkout-button');
    if (checkoutBtn) {
        const stripe = Stripe("{{ env('STRIPE_KEY_PUBLIC_MAGASIN') }}");
        checkoutBtn.addEventListener('click', async () => {
            checkoutBtn.disabled = true;
            checkoutBtn.textContent = "Redirection...";

            try {
                const res = await fetch("{{ route('checkout.create') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({})
                });
                const data = await res.json();
                if (data.url) {
                    window.location.href = data.url;
                } else {
                    Swal.fire({icon:'error', title:'Erreur', text: data.error || 'Impossible de créer la session de paiement.'});
                    checkoutBtn.disabled = false;
                    checkoutBtn.textContent = "Payer maintenant";
                }
            } catch(err) {
                console.error(err);
                Swal.fire({icon:'error', title:'Erreur', text:'Erreur lors de la connexion au serveur.'});
                checkoutBtn.disabled = false;
                checkoutBtn.textContent = "Payer maintenant";
            }
        });
    }
});
</script>
@endsection
