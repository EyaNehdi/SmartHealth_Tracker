@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            {{-- Fil d’Ariane --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-white shadow-sm p-2 rounded">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.produits.list') }}">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier un produit</li>
                </ol>
            </nav>

            {{-- Carte --}}
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h5 class="mb-0">Modifier un produit</h5>
                    <a href="{{ route('admin.produits.list') }}" class="btn btn-light btn-sm">Liste des produits</a>
                </div>

                <div class="card-body">

                    <form class="needs-validation" method="POST" action="{{ route('admin.produits.update', $produit->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        {{-- Nom du produit --}}
                        <div class="form-group">
                            <label for="nom">Nom du produit <span class="text-danger">*</span></label>
                            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                                   placeholder="Entrez le nom du produit (min 2 caractères)" value="{{ old('nom', $produit->nom) }}" required>
                            <div id="nomFeedback" class="text-danger small mt-1">@error('nom') {{ $message }} @enderror</div>
                        </div>

                        {{-- Catégorie --}}
                        <div class="form-group">
                            <label for="categorie_id">Catégorie <span class="text-danger">*</span></label>
                            <select name="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" id="categorie_id" required>
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ (old('categorie_id', $produit->categorie_id) == $categorie->id) ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="text-danger small mt-1">@error('categorie_id') {{ $message }} @enderror</div>
                        </div>

                        {{-- Prix et stock --}}
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="prix">Prix <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" 
                                       placeholder="Prix" value="{{ old('prix', $produit->prix) }}" required>
                                <div class="text-danger small mt-1">@error('prix') {{ $message }} @enderror</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="stock">Stock <span class="text-danger">*</span></label>
                                <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" 
                                       placeholder="Stock" value="{{ old('stock', $produit->stock) }}" required>
                                <div class="text-danger small mt-1">@error('stock') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" 
                                      placeholder="Entrez la description (min 5 caractères)" required>{{ old('description', $produit->description) }}</textarea>
                            <div id="descFeedback" class="text-danger small mt-1">@error('description') {{ $message }} @enderror</div>
                        </div>

                        {{-- Image --}}
                        <div class="form-group">
                            <label for="image">Image du produit <span class="text-danger">*</span></label>
                            @if($produit->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" style="width:120px; height:120px; object-fit:cover; border-radius:5px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                            <div class="text-danger small mt-1">@error('image') {{ $message }} @enderror</div>
                            <small class="text-muted">Laissez vide pour conserver l'image existante</small>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex justify-content-between mt-4">
                            <button type="reset" class="btn btn-outline-warning">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS validation temps réel --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nomInput = document.getElementById('nom');
    const descInput = document.getElementById('description');
    const nomFeedback = document.getElementById('nomFeedback');
    const descFeedback = document.getElementById('descFeedback');

    function validateNom() {
        const value = nomInput.value.trim();
        if (value === '') {
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.textContent = '⚠️ Le nom est obligatoire.';
        } else if (/^[\d\W]/.test(value)) {
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.textContent = '⚠️ Le nom ne peut pas commencer par un chiffre ou un symbole.';
        } else if (value.length < 2) {
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.textContent = '⚠️ Le nom doit contenir au moins 2 caractères.';
        } else if (value.length > 255) {
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.textContent = '⚠️ Le nom ne peut pas dépasser 255 caractères.';
        } else {
            nomInput.classList.remove('is-invalid'); nomInput.classList.add('is-valid');
            nomFeedback.textContent = '';
        }
    }

    function validateDescription() {
        const value = descInput.value.trim();
        if (value === '') {
            descInput.classList.add('is-invalid'); descInput.classList.remove('is-valid');
            descFeedback.textContent = '⚠️ La description est obligatoire.';
        } else if (/^[\d\W]/.test(value)) {
            descInput.classList.add('is-invalid'); descInput.classList.remove('is-valid');
            descFeedback.textContent = '⚠️ La description ne peut pas commencer par un chiffre ou un symbole.';
        } else if (value.length < 5) {
            descInput.classList.add('is-invalid'); descInput.classList.remove('is-valid');
            descFeedback.textContent = '⚠️ La description doit contenir au moins 5 caractères.';
        } else {
            descInput.classList.remove('is-invalid'); descInput.classList.add('is-valid');
            descFeedback.textContent = '';
        }
    }

    nomInput.addEventListener('input', validateNom);
    descInput.addEventListener('input', validateDescription);

    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            validateNom(); validateDescription();
            if (!form.checkValidity() || nomInput.classList.contains('is-invalid') || descInput.classList.contains('is-invalid')) {
                event.preventDefault(); event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
});
</script>

@endsection
