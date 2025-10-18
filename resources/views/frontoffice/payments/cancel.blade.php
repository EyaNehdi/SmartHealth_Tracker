@extends('shared.layouts.frontoffice')

@section('page-title', 'Paiement échoué')

@section('content')
<main class="main-area fix py-5">
    <div class="container text-center">
        <div class="card shadow-sm p-5">
            <i class="fas fa-times-circle fa-5x text-danger mb-4"></i>
            <h2 class="mb-3">Paiement annulé ou échoué</h2>
            <p class="mb-4">Votre paiement n’a pas pu être traité. Vous pouvez réessayer ou contacter le support.</p>
            <a href="{{ route('panier.show') }}" class="btn btn-primary">Retour au panier</a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Retour à l'accueil</a>
        </div>
    </div>
</main>
@endsection
