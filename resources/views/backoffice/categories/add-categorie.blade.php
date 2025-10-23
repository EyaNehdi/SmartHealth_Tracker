@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            {{-- Fil d’Ariane --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-white shadow-sm p-2 rounded">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.list') }}">Catégories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter une catégorie</li>
                </ol>
            </nav>

            {{-- Carte --}}
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h5 class="mb-0">Ajouter une catégorie</h5>
                    <a href="{{ route('admin.categories.list') }}" class="btn btn-light btn-sm">Liste des catégories</a>
                </div>

                <div class="card-body">

                    {{-- Message de succès --}}
                    @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="material-icons mr-2">check_circle_outline</i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="needs-validation" method="POST" action="{{ route('admin.categories.store') }}" novalidate>
                        @csrf

                        {{-- Nom de la catégorie --}}
                        <div class="form-group">
                            <label for="nom">Nom de la catégorie <span class="text-danger">*</span></label>
                            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                                   placeholder="Entrez le nom de la catégorie (min 2 caractères)" value="{{ old('nom') }}" required>
                            <div id="nomFeedback" class="text-danger small mt-1">
                                @error('nom') {{ $message }} @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Entrez la description (min 5 caractères)" required>{{ old('description') }}</textarea>
                            <div id="descFeedback" class="text-danger small mt-1">
                                @error('description') {{ $message }} @enderror
                            </div>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex justify-content-between mt-4">
                            <button type="reset" class="btn btn-outline-warning">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
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
            nomFeedback.innerHTML = '⚠️ Le nom est obligatoire.';
        } else if (/^[\d\W]/.test(value)) { // chiffre ou symbole au début
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.innerHTML = '⚠️ Le nom ne peut pas commencer par un chiffre ou un symbole.';
        } else if (value.length < 2) {
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.innerHTML = '⚠️ Le nom doit contenir au moins 2 caractères.';
        } else if (value.length > 255) {
            nomInput.classList.add('is-invalid'); nomInput.classList.remove('is-valid');
            nomFeedback.innerHTML = '⚠️ Le nom ne peut pas dépasser 255 caractères.';
        } else {
            nomInput.classList.remove('is-invalid'); nomInput.classList.add('is-valid');
            nomFeedback.innerHTML = '';
        }
    }

    function validateDescription() {
        const value = descInput.value.trim();
        if (/^[\d\W]/.test(value)) { // chiffre ou symbole au début
            descInput.classList.add('is-invalid'); descInput.classList.remove('is-valid');
            descFeedback.innerHTML = '⚠️ La description ne peut pas commencer par un chiffre ou un symbole.';
        } else if (value.length < 5) {
            descInput.classList.add('is-invalid'); descInput.classList.remove('is-valid');
            descFeedback.innerHTML = '⚠️ La description doit contenir au moins 5 caractères.';
        } else {
            descInput.classList.remove('is-invalid'); descInput.classList.add('is-valid');
            descFeedback.innerHTML = '';
        }
    }

    nomInput.addEventListener('input', validateNom);
    descInput.addEventListener('input', validateDescription);

    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            validateNom();
            validateDescription();
            if (!form.checkValidity() || nomInput.classList.contains('is-invalid') || descInput.classList.contains('is-invalid')) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
});
</script>

@endsection
