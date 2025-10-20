@extends('shared.layouts.frontoffice')

@section('page-title', 'Paiement réussi')

@section('content')
<main class="main-area fix py-5">
    <div class="container text-center">
        <div class="card shadow-sm p-5">
            <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
            <h2 class="mb-3">Paiement réussi !</h2>
            <p class="mb-4">Merci pour votre achat. Votre commande a été enregistrée avec succès.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
            <a href="{{ route('produits.index') }}" class="btn btn-outline-secondary">Voir plus de produits</a>
        </div>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', () => {
    function clearCartUI() {
        // Panier principal
        const panierContainer = document.getElementById('panier-container');
        const panierTotal = document.getElementById('panier-total');

        if (panierContainer) {
            panierContainer.innerHTML = `
                <div class="text-center py-5">
                    <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Votre panier est vide.</h5>
                </div>
            `;
        }
        if (panierTotal) panierTotal.textContent = "0.00";

        // Mini-panier
        const miniPanier = document.querySelector('.shop-mini-panier');
        if (miniPanier) {
            const list = miniPanier.querySelector('.mini-panier-items');
            const total = miniPanier.querySelector('.mini-panier-total');
            if (list) list.innerHTML = '';
            if (total) total.textContent = "0.00";
        }
    }

    clearCartUI();
});
</script>
@endsection
