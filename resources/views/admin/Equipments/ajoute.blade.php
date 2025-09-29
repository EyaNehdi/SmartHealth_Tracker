@extends('layouts.adminLayout')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.equipments.list') }}">Équipements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter un Équipement</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Ajouter un Équipement</h6>
                    <a href="{{ route('admin.equipments.list') }}" class="ms-text-primary">Liste des Équipements</a>
                </div>
                <div class="ms-panel-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="needs-validation" method="POST" action="{{ route('admin.equipments.store') }}" id="equipmentForm" novalidate>
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrer le nom de l'équipement" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('type') ? '' : 'selected' }}>Sélectionner un type</option>
                                    <option value="cardio" {{ old('type') == 'cardio' ? 'selected' : '' }}>Cardio</option>
                                    <option value="musculation" {{ old('type') == 'musculation' ? 'selected' : '' }}>Musculation</option>
                                    <option value="rééducation" {{ old('type') == 'rééducation' ? 'selected' : '' }}>Rééducation</option>
                                    <option value="autre" {{ old('type') == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Entrer une description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="statut" class="form-label">Statut <span class="text-danger">*</span></label>
                                <select name="statut" id="statut" class="form-control @error('statut') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('statut') ? '' : 'selected' }}>Sélectionner un statut</option>
                                    <option value="disponible" {{ old('statut') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="indisponible" {{ old('statut') == 'indisponible' ? 'selected' : '' }}>Indisponible</option>
                                </select>
                                @error('statut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-warning mt-4 mr-2" type="reset">Réinitialiser</button>
                                <button class="btn btn-primary mt-4" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Intégration d'EmailJS -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script>
    // Initialisation d'EmailJS avec la clé publique
    emailjs.init("{{ env('MAILJS_PUBLIC_KEY') }}");

    // Écouteur d'événement pour la soumission du formulaire
    document.getElementById('equipmentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche la soumission par défaut pour gérer l'envoi d'e-mail

        // Valider le formulaire côté client
        if (this.checkValidity()) {
            // Récupérer les données du formulaire
            const formData = new FormData(this);
            const data = {
                nom: formData.get('nom'),
                type: formData.get('type'),
                description: formData.get('description') || 'Aucune description',
                statut: formData.get('statut'),
                to_email: 'lourassijihed@gmail.com'
            };

            // Envoyer l'e-mail avec EmailJS
            emailjs.send("{{ env('EMAILJS_SERVICE_ID') }}", "{{ env('EMAILJS_TEMPLATE_ID') }}", data)
                .then(function(response) {
                    console.log('E-mail envoyé avec succès', response);
                    // Soumettre le formulaire après l'envoi de l'e-mail
                    document.getElementById('equipmentForm').submit();
                }, function(error) {
                    console.error('Erreur lors de l\'envoi de l\'e-mail', error);
                    alert('Une erreur s\'est produite lors de l\'envoi de l\'e-mail. Veuillez réessayer.');
                });
        } else {
            this.classList.add('was-validated'); // Afficher les erreurs de validation
        }
    });
</script>

<style>
    .ms-content-wrapper {
        padding: 30px;
        background-color: #f8f9fa;
    }
    .ms-panel {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .ms-panel-header {
        padding: 20px;
        border-bottom: 1px solid #e9ecef;
    }
    .ms-panel-body {
        padding: 20px;
    }
    .form-row {
        margin-bottom: 1rem;
    }
    .form-label {
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .form-control.is-invalid {
        border-color: #dc3545;
    }
    .invalid-feedback {
        font-size: 0.875rem;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 0.5rem 2rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        padding: 0.5rem 2rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: background-color 0.3s ease;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }
    .alert-dismissible {
        margin-bottom: 1.5rem;
    }
    .text-danger {
        font-size: 1rem;
        font-weight: bold;
    }
    .breadcrumb {
        background-color: transparent;
        padding: 0;
        margin-bottom: 1.5rem;
    }
    .ms-text-primary {
        color: #007bff;
        font-weight: 500;
    }
</style>
@endsection
