@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.activities.index') }}">Activités</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier une Activité</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Modifier une Activité</h6>
                    <a href="{{ route('admin.activities.index') }}" class="ms-text-primary">Liste des Activités</a>
                </div>
                <div class="ms-panel-body">
                    @if (session('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('updated') }}
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
                    <form class="needs-validation" method="POST" action="{{ route('admin.activities.update', $activity->id) }}" id="activityForm" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrer le nom de l'activité (lettres, espaces ou tirets)" value="{{ old('nom', $activity->nom) }}" required>
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
                                <input type="datetime-local" name="date_debut" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" value="{{ old('date_debut', $activity->date_debut ? $activity->date_debut->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" required>
                                @error('date_debut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La date de début est requise.</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_fin" class="form-label">Date de fin <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date_fin" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" value="{{ old('date_fin', $activity->date_fin ? $activity->date_fin->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" required>
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
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" minlength="10" placeholder="Entrer une description" rows="4" required>{{ old('description', $activity->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">La description est requise et doit contenir au moins 10 caractères.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/jpeg,image/png,image/jpg">
                                <input type="hidden" name="existing_image" value="{{ old('existing_image', $activity->image) }}">
                                @if ($activity->image)
                                    <div class="mt-2">
                                        <small>Image actuelle :</small><br>
                                        <img src="{{ asset('storage/' . $activity->image) }}" alt="Image actuelle" style="max-width: 100px; max-height: 100px; object-fit: cover; border-radius: 4px;">
                                        <a href="{{ asset('storage/' . $activity->image) }}" target="_blank">Voir en grand</a>
                                    </div>
                                @else
                                    <small>Aucune image actuelle.</small>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">L'image doit être au format JPG, PNG ou JPEG (max 2MB).</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prix" class="form-label">Prix (€) <span class="text-danger">*</span></label>
                                <input type="number" name="prix" class="form-control @error('prix') is-invalid @enderror" id="prix" value="{{ old('prix', $activity->prix) }}" step="0.01" min="0" placeholder="0.00" required>
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
                                <input type="hidden" name="existing_support_pdf" value="{{ old('existing_support_pdf', $activity->support_pdf) }}">
                                @if ($activity->support_pdf)
                                    <div class="mt-2">
                                        <small>PDF actuel : <a href="{{ asset('storage/' . $activity->support_pdf) }}" target="_blank">{{ basename($activity->support_pdf) }}</a></small>
                                    </div>
                                @else
                                    <small>Aucun PDF actuel.</small>
                                @endif
                                @error('support_pdf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Le fichier doit être un PDF (max 10MB).</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="support_video" class="form-label">Support Vidéo</label>
                                <input type="file" name="support_video" class="form-control @error('support_video') is-invalid @enderror" id="support_video" accept="video/mp4,video/avi,video/mov">
                                <input type="hidden" name="existing_support_video" value="{{ old('existing_support_video', $activity->support_video) }}">
                                @if ($activity->support_video)
                                    <div class="mt-2">
                                        <small>Vidéo actuelle : <a href="{{ asset('storage/' . $activity->support_video) }}" target="_blank">{{ basename($activity->support_video) }}</a></small>
                                    </div>
                                @else
                                    <small>Aucune vidéo actuelle.</small>
                                @endif
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
                                        <option value="{{ $equipment->id }}" {{ in_array($equipment->id, old('equipments', $activity->equipments->pluck('id')->toArray())) ? 'selected' : '' }}>
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
                                <textarea name="equipment_comment" class="form-control @error('equipment_comment') is-invalid @enderror" id="equipment_comment" placeholder="Entrer un commentaire sur les équipements" rows="4" required>{{ old('equipment_comment', $activity->equipments->isNotEmpty() ? $activity->equipments->first()->pivot->commentaire : '') }}</textarea>
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
                                <button type="submit" class="btn btn-primary mt-4" id="submitButton">Mettre à jour</button>
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

        const form = document.getElementById('activityForm');
        const submitButton = document.getElementById('submitButton');
        const formError = document.getElementById('formError');
        const inputs = form.querySelectorAll('input:not([type="hidden"]), textarea, select');
        const requiredInputs = [
            document.getElementById('nom'),
            document.getElementById('date_debut'),
            document.getElementById('date_fin'),
            document.getElementById('description'),
            document.getElementById('prix'),
            document.getElementById('equipment_comment'),
            document.getElementById('equipments')
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
            formError.innerHTML = message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        }

        // Function to validate nom (letters, spaces, hyphens, and French accented characters)
        function validateNom() {
            const regex = /^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/u;
            if (!nomInput.value.trim()) {
                nomInput.setCustomValidity('Le nom de l\'activité est requis.');
                nomInput.classList.add('is-invalid');
                nomInput.classList.remove('is-valid');
                return false;
            }
            if (!regex.test(nomInput.value)) {
                nomInput.setCustomValidity('Le nom doit contenir uniquement des lettres, espaces ou tirets.');
                nomInput.classList.add('is-invalid');
                nomInput.classList.remove('is-valid');
                return false;
            }
            nomInput.setCustomValidity('');
            nomInput.classList.add('is-valid');
            nomInput.classList.remove('is-invalid');
            return true;
        }

        // Function to validate required fields
        function validateRequired(input, fieldName) {
            if (input === equipmentsSelect) {
                return validateEquipments();
            }
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

        // Function to validate equipments (at least one selected)
        function validateEquipments() {
            if (equipmentsSelect.selectedOptions.length === 0) {
                equipmentsSelect.setCustomValidity('Au moins un équipement doit être sélectionné.');
                equipmentsSelect.classList.add('is-invalid');
                equipmentsSelect.classList.remove('is-valid');
                return false;
            }
            equipmentsSelect.setCustomValidity('');
            equipmentsSelect.classList.add('is-valid');
            equipmentsSelect.classList.remove('is-invalid');
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
            return true; // File inputs are optional
        }

        // Function to validate dates
        function validateDates() {
            if (!dateDebut.value || !dateFin.value) {
                if (!dateDebut.value) {
                    dateDebut.setCustomValidity('La date de début est requise.');
                    dateDebut.classList.add('is-invalid');
                    dateDebut.classList.remove('is-valid');
                }
                if (!dateFin.value) {
                    dateFin.setCustomValidity('La date de fin est requise.');
                    dateFin.classList.add('is-invalid');
                    dateFin.classList.remove('is-valid');
                }
                return false;
            }
            const debut = new Date(dateDebut.value);
            const fin = new Date(dateFin.value);
            if (fin < debut) {
                dateFin.setCustomValidity('La date de fin doit être postérieure ou égale à la date de début.');
                dateFin.classList.add('is-invalid');
                dateFin.classList.remove('is-valid');
                return false;
            }
            dateDebut.setCustomValidity('');
            dateFin.setCustomValidity('');
            dateDebut.classList.add('is-valid');
            dateDebut.classList.remove('is-invalid');
            dateFin.classList.add('is-valid');
            dateFin.classList.remove('is-invalid');
            return true;
        }

        // Function to validate price
        function validatePrice() {
            if (!prixInput.value.trim()) {
                prixInput.setCustomValidity('Le prix est requis.');
                prixInput.classList.add('is-invalid');
                prixInput.classList.remove('is-valid');
                return false;
            }
            if (parseFloat(prixInput.value) < 0) {
                prixInput.setCustomValidity('Le prix doit être un nombre positif ou zéro.');
                prixInput.classList.add('is-invalid');
                prixInput.classList.remove('is-valid');
                return false;
            }
            prixInput.setCustomValidity('');
            prixInput.classList.add('is-valid');
            prixInput.classList.remove('is-invalid');
            return true;
        }

        // Function to validate description length
        function validateDescription() {
            if (descriptionInput.value.length < 10) {
                descriptionInput.setCustomValidity('La description doit contenir au moins 10 caractères.');
                descriptionInput.classList.add('is-invalid');
                descriptionInput.classList.remove('is-valid');
                return false;
            }
            descriptionInput.setCustomValidity('');
            descriptionInput.classList.add('is-valid');
            descriptionInput.classList.remove('is-invalid');
            return true;
        }

        // Function to check overall form validity
        function checkFormValidity() {
            const isValid =
                validateNom() &&
                validateRequired(dateDebut, 'Date de début') &&
                validateRequired(dateFin, 'Date de fin') &&
                validateDates() &&
                validateRequired(descriptionInput, 'Description') &&
                validateDescription() &&
                validateRequired(prixInput, 'Prix') &&
                validatePrice() &&
                validateRequired(equipmentCommentInput, 'Commentaire sur les équipements') &&
                validateEquipments() &&
                validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg']) &&
                validateFile(pdfInput, 10, ['application/pdf']) &&
                validateFile(videoInput, 50, ['video/mp4', 'video/avi', 'video/mov']);

            submitButton.disabled = !isValid;
            toggleFormError(!isValid);
            return isValid;
        }

        // Function to validate and set classes for all inputs
        function validateAllInputs() {
            validateNom();
            validateRequired(dateDebut, 'Date de début');
            validateRequired(dateFin, 'Date de fin');
            validateDates();
            validateRequired(descriptionInput, 'Description');
            validateDescription();
            validateRequired(prixInput, 'Prix');
            validatePrice();
            validateRequired(equipmentCommentInput, 'Commentaire sur les équipements');
            validateEquipments();
            validateFile(imageInput, 2, ['image/jpeg', 'image/png', 'image/jpg']);
            validateFile(pdfInput, 10, ['application/pdf']);
            validateFile(videoInput, 50, ['video/mp4', 'video/avi', 'video/mov']);
            checkFormValidity();
        }

        // Real-time validation on input change
        inputs.forEach(input => {
            const eventType = input.tagName === 'SELECT' ? 'change' : 'input';
            input.addEventListener(eventType, () => {
                if (input === nomInput) validateNom();
                if (input === dateDebut || input === dateFin) validateDates();
                if (input === descriptionInput) validateDescription();
                if (input === prixInput) validatePrice();
                if (input === equipmentCommentInput) validateRequired(input, 'Commentaire sur les équipements');
                if (input === equipmentsSelect) validateEquipments();
                if (input === imageInput) validateFile(input, 2, ['image/jpeg', 'image/png', 'image/jpg']);
                if (input === pdfInput) validateFile(input, 10, ['application/pdf']);
                if (input === videoInput) validateFile(input, 50, ['video/mp4', 'video/avi', 'video/mov']);
                if (requiredInputs.includes(input) && input !== equipmentsSelect) validateRequired(input, input.previousElementSibling.textContent.trim().replace('*', ''));
                checkFormValidity();
            });
        });

        // Prevent form submission if invalid
        form.addEventListener('submit', function (event) {
            let isValid = checkFormValidity();
            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                toggleFormError(true);
                validateAllInputs();
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
            Array.from(equipmentsSelect.options).forEach(option => option.selected = false);
            submitButton.disabled = true;
            toggleFormError(false);
        });

        // Initial validation on page load
        validateAllInputs();
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
    img {
        object-fit: cover;
        border-radius: 4px;
    }
</style>
@endsection