@extends('shared.layouts.backoffice')

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
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div id="formError" class="alert alert-danger alert-dismissible fade d-none" role="alert">
                        Il y a des champs vides ou invalides. Veuillez vérifier vos saisies.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" method="POST" action="{{ route('admin.equipments.store') }}" id="equipmentForm" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrer le nom de l'équipement (lettres, espaces ou tirets)" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback" id="nom-error">Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).</div>
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
                                @else
                                    <div class="invalid-feedback">Le type est requis.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="marque" class="form-label">Marque <span class="text-danger">*</span></label>
                                <input type="text" name="marque" class="form-control @error('marque') is-invalid @enderror" id="marque" placeholder="Entrer la marque de l'équipement (lettres, espaces ou tirets)" value="{{ old('marque') }}" required>
                                @error('marque')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">L'image doit être au format JPEG, PNG, JPG ou GIF (max 2MB).</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="etat" class="form-label">État <span class="text-danger">*</span></label>
                                <select name="etat" id="etat" class="form-control @error('etat') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('etat') ? '' : 'selected' }}>Sélectionner un état</option>
                                    <option value="neuf" {{ old('etat') == 'neuf' ? 'selected' : '' }}>Neuf</option>
                                    <option value="bon" {{ old('etat') == 'bon' ? 'selected' : '' }}>Bon</option>
                                    <option value="usagé" {{ old('etat') == 'usagé' ? 'selected' : '' }}>Usagé</option>
                                    <option value="à réparer" {{ old('etat') == 'à réparer' ? 'selected' : '' }}>À réparer</option>
                                </select>
                                @error('etat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">L'état est requis.</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Entrer une description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La description est invalide.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-warning mt-4 mr-2" type="reset">Réinitialiser</button>
<button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';

        const form = document.getElementById('equipmentForm');
        const submitButton = document.getElementById('submitButton');
        const formError = document.getElementById('formError');
        const inputs = form.querySelectorAll('input, textarea, select');
        const requiredInputs = [
            document.getElementById('nom'),
            document.getElementById('type'),
            document.getElementById('marque'),
            document.getElementById('etat')
        ];
        const nomInput = document.getElementById('nom');
        const marqueInput = document.getElementById('marque');
        const typeSelect = document.getElementById('type');
        const etatSelect = document.getElementById('etat');
        const imageInput = document.getElementById('image');
        const descriptionInput = document.getElementById('description');

        // Function to show/hide global error message
        function toggleFormError(show, message = 'Il y a des champs vides ou invalides. Veuillez vérifier vos saisies.') {
            formError.classList.toggle('d-none', !show);
            formError.innerHTML = message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        }

        // Function to validate nom
        function validateNom() {
            const regex = /^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/;
            if (!nomInput.value.trim()) {
                nomInput.setCustomValidity('Le nom de l\'équipement est requis.');
                nomInput.classList.add('is-invalid');
                nomInput.classList.remove('is-valid');
                document.getElementById('nom-error').textContent = 'Le nom de l\'équipement est requis.';
                return false;
            }
            if (!regex.test(nomInput.value)) {
                nomInput.setCustomValidity('Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).');
                nomInput.classList.add('is-invalid');
                nomInput.classList.remove('is-valid');
                document.getElementById('nom-error').textContent = 'Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).';
                return false;
            }
            nomInput.setCustomValidity('');
            nomInput.classList.add('is-valid');
            nomInput.classList.remove('is-invalid');
            document.getElementById('nom-error').textContent = 'Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).';
            return true;
        }

        // Function to validate marque
        function validateMarque() {
            const regex = /^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/;
            if (!marqueInput.value.trim()) {
                marqueInput.setCustomValidity('La marque est requise.');
                marqueInput.classList.add('is-invalid');
                marqueInput.classList.remove('is-valid');
                document.getElementById('marque-error').textContent = 'La marque est requise.';
                return false;
            }
            if (!regex.test(marqueInput.value)) {
                marqueInput.setCustomValidity('La marque doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).');
                marqueInput.classList.add('is-invalid');
                marqueInput.classList.remove('is-valid');
                document.getElementById('marque-error').textContent = 'La marque doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).';
                return false;
            }
            marqueInput.setCustomValidity('');
            marqueInput.classList.add('is-valid');
            marqueInput.classList.remove('is-invalid');
            document.getElementById('marque-error').textContent = 'La marque doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).';
            return true;
        }

        // Function to validate required fields
        function validateRequired(input, fieldName) {
            if (!input.value.trim()) {
                input.setCustomValidity(`${fieldName} est requis.`);
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                return false;
            }
            input.setCustomValidity('');
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
            return true;
        }

        // Function to validate file size and type
        function validateFile(input, maxSizeMB, allowedTypes) {
            if (input.files.length > 0) {
                const file = input.files[0];
                const fileSizeMB = file.size / (1024 * 1024);
                const fileType = file.type;
                if (fileSizeMB > maxSizeMB) {
                    input.setCustomValidity(`Le fichier ne doit pas dépasser ${maxSizeMB}MB.`);
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    return false;
                }
                if (!allowedTypes.includes(fileType)) {
                    input.setCustomValidity(`Le fichier doit être de type ${allowedTypes.join(', ')}.`);
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    return false;
                }
                input.setCustomValidity('');
                input.classList.add('is-valid');
                input.classList.remove('is-invalid');
                return true;
            }
            return true;
        }

        // Function to check overall form validity
        function checkFormValidity() {
            let isValid = true;
            isValid = isValid && validateRequired(typeSelect, 'Le type');
            isValid = isValid && validateRequired(etatSelect, 'L\'état');
            isValid = isValid && validateNom();
            isValid = isValid && validateMarque();
            isValid = isValid && validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']);
            submitButton.disabled = !isValid;
            toggleFormError(!isValid);
            return isValid;
        }

        // Real-time validation on input change
        inputs.forEach(input => {
            const eventType = input.tagName === 'SELECT' ? 'change' : 'input';
            input.addEventListener(eventType, () => {
                if (input === nomInput) validateNom();
                if (input === marqueInput) validateMarque();
                if (input === typeSelect) validateRequired(typeSelect, 'Le type');
                if (input === etatSelect) validateRequired(etatSelect, 'L\'état');
                if (input === imageInput) validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']);
                checkFormValidity();
            });
        });

        // Prevent form submission if invalid
        form.addEventListener('submit', function (event) {
            let isValid = true;
            isValid = isValid && validateRequired(typeSelect, 'Le type');
            isValid = isValid && validateRequired(etatSelect, 'L\'état');
            isValid = isValid && validateNom();
            isValid = isValid && validateMarque();
            isValid = isValid && validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']);

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                toggleFormError(true, 'Il y a des champs vides ou invalides. Veuillez vérifier vos saisies.');
                if (!nomInput.value.trim() || !validateNom()) {
                    nomInput.classList.add('is-invalid');
                    nomInput.classList.remove('is-valid');
                }
                if (!marqueInput.value.trim() || !validateMarque()) {
                    marqueInput.classList.add('is-invalid');
                    marqueInput.classList.remove('is-valid');
                }
                if (!typeSelect.value.trim()) {
                    typeSelect.classList.add('is-invalid');
                    typeSelect.classList.remove('is-valid');
                }
                if (!etatSelect.value.trim()) {
                    etatSelect.classList.add('is-invalid');
                    etatSelect.classList.remove('is-valid');
                }
                if (imageInput.files.length > 0 && !validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'])) {
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                }
            } else {
                toggleFormError(false);
            }
        });

        // Reset form handler
        form.addEventListener('reset', () => {
            inputs.forEach(input => {
                input.classList.remove('is-valid', 'is-invalid');
                input.setCustomValidity('');
            });
            document.getElementById('nom-error').textContent = 'Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).';
            document.getElementById('marque-error').textContent = 'La marque doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).';
            submitButton.disabled = true;
            toggleFormError(false);
        });

        // Initial form validation check
        checkFormValidity();
    })();
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
        background-image: none;
    }
    .form-control.is-valid {
        border-color: #28a745;
        background-image: none;
    }
    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
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
    .btn-primary:disabled {
        background-color: #6c757d;
        border-color: #6c757d;
        cursor: not-allowed;
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
    .alert {
        position: relative;
    }
    .alert .btn-close {
        position: absolute;
        top: 0.75rem;
        right: 1rem;
    }
</style>
@endsection