@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.activities.index') }}">Activités</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter une Activité</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Ajouter une Activité</h6>
                    <a href="{{ route('admin.activities.index') }}" class="ms-text-primary">Liste des Activités</a>
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
                    <div id="formError" class="alert alert-danger alert-dismissible fade d-none" role="alert">
                        Il y a des champs vides ou invalides. Veuillez vérifier vos saisies.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" method="POST" action="{{ route('admin.activities.store') }}" id="activityForm" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrer le nom de l'activité (lettres uniquement)" value="{{ old('nom') }}" required pattern="[A-Za-z\s\-]+">
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Le nom doit contenir uniquement des lettres, espaces ou tirets.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="date_debut" class="form-label">Date de début <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date_debut" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" value="{{ old('date_debut', now()->format('Y-m-d\TH:i')) }}" required>
                                @error('date_debut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La date de début est requise.</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_fin" class="form-label">Date de fin <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date_fin" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" value="{{ old('date_fin', now()->format('Y-m-d\TH:i')) }}" required>
                                @error('date_fin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La date de fin doit être postérieure ou égale à la date de début.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"  minlength="10" placeholder="Entrer une description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La description est requise.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/jpeg,image/png,image/jpg">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">L'image doit être au format JPG, PNG ou JPEG (max 2MB).</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prix" class="form-label">Prix (€) <span class="text-danger">*</span></label>
                                <input type="number" name="prix" class="form-control @error('prix') is-invalid @enderror" id="prix" value="{{ old('prix') }}" step="0.01" min="0" placeholder="0.00" required>
                                @error('prix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Le prix doit être un nombre positif ou zéro.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="support_pdf" class="form-label">Support PDF</label>
                                <input type="file" name="support_pdf" class="form-control @error('support_pdf') is-invalid @enderror" id="support_pdf" accept="application/pdf">
                                @error('support_pdf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Le fichier doit être un PDF (max 10MB).</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="support_video" class="form-label">Support Vidéo</label>
                                <input type="file" name="support_video" class="form-control @error('support_video') is-invalid @enderror" id="support_video" accept="video/mp4,video/avi,video/mov">
                                @error('support_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La vidéo doit être au format MP4, AVI ou MOV (max 50MB).</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="equipments" class="form-label">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px;">
                                        <path d="M3 9h12" stroke="#6b7280" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M9 3v12" stroke="#6b7280" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    Équipements utilisés <span class="text-danger">*</span>
                                </label>
                                <select name="equipments[]" id="equipments" class="form-control @error('equipments') is-invalid @enderror" multiple required>
                                    @foreach ($equipments as $equipment)
                                        <option value="{{ $equipment->id }}" {{ in_array($equipment->id, old('equipments', [])) ? 'selected' : '' }}>
                                            {{ $equipment->nom }} ({{ $equipment->type }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('equipments')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Au moins un équipement doit être sélectionné.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="equipment_comment" class="form-label">Commentaire sur l’utilisation des équipements <span class="text-danger">*</span></label>
                                <textarea name="equipment_comment" class="form-control @error('equipment_comment') is-invalid @enderror" id="equipment_comment" placeholder="Entrer un commentaire sur les équipements" rows="4" required>{{ old('equipment_comment') }}</textarea>
                                @error('equipment_comment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Le commentaire sur les équipements est requis.</div>
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
    // Client-side validation for the form
    (function () {
        'use strict';

        const form = document.getElementById('activityForm');
        const submitButton = document.getElementById('submitButton');
        const formError = document.getElementById('formError');
        const inputs = form.querySelectorAll('input, textarea, select');
        const requiredInputs = [
            document.getElementById('nom'), 
            document.getElementById('date_debut'), 
            document.getElementById('date_fin'),
            document.getElementById('description'),
            document.getElementById('prix'),
            document.getElementById('equipment_comment')
        ];
        const nomInput = document.getElementById('nom');
        const dateDebut = document.getElementById('date_debut');
        const dateFin = document.getElementById('date_fin');
        const descriptionInput = document.getElementById('description');
        const prixInput = document.getElementById('prix');
        const equipmentCommentInput = document.getElementById('equipment_comment');
        const equipmentsSelect = document.getElementById('equipments');
        const imageInput = document.getElementById('image');
        const pdfInput = document.getElementById('support_pdf');
        const videoInput = document.getElementById('support_video');

        // Function to show/hide global error message
        function toggleFormError(show, message = 'Il y a des champs vides ou invalides. Veuillez vérifier vos saisies.') {
            formError.classList.toggle('d-none', !show);
            if (formError.querySelector('.msg')) {
                formError.querySelector('.msg').textContent = message;
            } else {
                formError.innerHTML = message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            }
        }

        // Function to validate nom (letters, spaces, and hyphens only)
        function validateNom() {
            const regex = /^[A-Za-z\s\-]+$/;
            if (!nomInput.value.trim()) {
                nomInput.setCustomValidity('Le nom de l\'activité est requis.');
                return false;
            }
            if (!regex.test(nomInput.value)) {
                nomInput.setCustomValidity('Le nom doit contenir uniquement des lettres, espaces ou tirets.');
                return false;
            }
            nomInput.setCustomValidity('');
            return true;
        }

        // Function to validate required fields
        function validateRequired(input) {
            if (!input.value.trim()) {
                input.setCustomValidity(`${input.previousElementSibling ? input.previousElementSibling.textContent.trim().replace('*', '') : input.name} est requis.`);
                return false;
            }
            input.setCustomValidity('');
            return true;
        }

        // Function to validate equipments (at least one selected)
        function validateEquipments() {
            if (equipmentsSelect.selectedOptions.length === 0) {
                equipmentsSelect.setCustomValidity('Au moins un équipement doit être sélectionné.');
                return false;
            }
            equipmentsSelect.setCustomValidity('');
            return true;
        }

        // Function to validate file size and type
        function validateFile(input, maxSizeMB, allowedTypes) {
            if (input.files.length > 0) {
                const file = input.files[0];
                const fileSizeMB = file.size / (1024 * 1024); // Convert bytes to MB
                const fileType = file.type;
                if (fileSizeMB > maxSizeMB) {
                    input.setCustomValidity(`Le fichier ne doit pas dépasser ${maxSizeMB}MB.`);
                    return false;
                }
                if (!allowedTypes.includes(fileType)) {
                    input.setCustomValidity(`Le fichier doit être de type ${allowedTypes.join(', ')}.`);
                    return false;
                }
                input.setCustomValidity('');
                return true;
            }
            return true; // No file uploaded is valid (since files are optional)
        }

        // Function to validate dates
        function validateDates() {
            if (!dateDebut.value || !dateFin.value) {
                if (!dateDebut.value) dateDebut.setCustomValidity('La date de début est requise.');
                if (!dateFin.value) dateFin.setCustomValidity('La date de fin est requise.');
                return false;
            }
            const debut = new Date(dateDebut.value);
            const fin = new Date(dateFin.value);
            if (fin < debut) {
                dateFin.setCustomValidity('La date de fin doit être postérieure ou égale à la date de début.');
                return false;
            }
            dateDebut.setCustomValidity('');
            dateFin.setCustomValidity('');
            return true;
        }

        // Function to validate price
        function validatePrice() {
            if (!prixInput.value.trim()) {
                prixInput.setCustomValidity('Le prix est requis.');
                return false;
            }
            if (parseFloat(prixInput.value) < 0) {
                prixInput.setCustomValidity('Le prix doit être un nombre positif ou zéro.');
                return false;
            }
            prixInput.setCustomValidity('');
            return true;
        }

        // Function to check overall form validity
        function checkFormValidity() {
            let isValid = true;
            // Explicitly check required fields
            requiredInputs.forEach(input => {
                isValid = isValid && validateRequired(input);
            });
            isValid = isValid && validateNom();
            isValid = isValid && validateDates();
            isValid = isValid && validatePrice();
            isValid = isValid && validateEquipments();
            isValid = isValid && validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg']);
            isValid = isValid && validateFile(pdfInput, 10, ['application/pdf']);
            isValid = isValid && validateFile(videoInput, 50, ['video/mp4', 'video/avi', 'video/mov']);
            submitButton.disabled = !isValid;
            toggleFormError(false); // Hide error when form is being edited
            return isValid;
        }

        // Real-time validation on input change
        inputs.forEach(input => {
            const eventType = input.tagName === 'SELECT' ? 'change' : 'input';
            input.addEventListener(eventType, () => {
                if (input === nomInput) validateNom();
                if (input === dateDebut || input === dateFin) validateDates();
                if (input === prixInput) validatePrice();
                if (input === equipmentsSelect) validateEquipments();
                if (input === imageInput) validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg']);
                if (input === pdfInput) validateFile(pdfInput, 10, ['application/pdf']);
                if (input === videoInput) validateFile(videoInput, 50, ['video/mp4', 'video/avi', 'video/mov']);
                
                if (requiredInputs.includes(input)) validateRequired(input);
                
                if (input.checkValidity() && (!input.required || input.value.trim())) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                }
                checkFormValidity();
            });
        });

        // Prevent form submission if invalid
        form.addEventListener('submit', function (event) {
            let isValid = true;
            // Explicitly validate required fields
            requiredInputs.forEach(input => {
                isValid = isValid && validateRequired(input);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    input.setCustomValidity(`${input.name} est requis.`);
                }
            });
            isValid = isValid && validateNom();
            isValid = isValid && validateDates();
            isValid = isValid && validatePrice();
            isValid = isValid && validateEquipments();
            isValid = isValid && validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg']);
            isValid = isValid && validateFile(pdfInput, 10, ['application/pdf']);
            isValid = isValid && validateFile(videoInput, 50, ['video/mp4', 'video/avi', 'video/mov']);

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                toggleFormError(true, 'Il y a des champs vides ou invalides. Veuillez vérifier vos saisies.');
                inputs.forEach(input => {
                    if (requiredInputs.includes(input) && !input.value.trim()) {
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                        input.setCustomValidity(`${input.name} est requis.`);
                    } else if (input === nomInput && !validateNom()) {
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                    } else if (input === dateDebut || input === dateFin) {
                        validateDates();
                        if (!input.checkValidity()) {
                            input.classList.add('is-invalid');
                            input.classList.remove('is-valid');
                        }
                    } else if (input === prixInput && !validatePrice()) {
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                    } else if (input === equipmentsSelect && !validateEquipments()) {
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                    } else if (input === imageInput || input === pdfInput || input === videoInput) {
                        if (!validateFile(input, input === imageInput ? 2 : input === pdfInput ? 10 : 50, 
                            input === imageInput ? ['image/jpeg', 'image/png', 'image/jpg'] : 
                            input === pdfInput ? ['application/pdf'] : ['video/mp4', 'video/avi', 'video/mov'])) {
                            input.classList.add('is-invalid');
                            input.classList.remove('is-valid');
                        }
                    }
                });
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
            // Clear selected options
            Array.from(equipmentsSelect.options).forEach(option => option.selected = false);
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
    .valid-feedback {
        font-size: 0.875rem;
        color: #28a745;
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
    select[multiple] {
        height: 150px;
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