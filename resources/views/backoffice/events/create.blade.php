@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Event</li>
                </ol>
            </nav>
        </div>

        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Ajouter Event</h6>
                    <a href="{{ route('admin.events.index') }}" class="ms-text-primary">Events List</a>
                </div>

                <div class="ms-panel-body">
                    <form id="eventForm" method="POST" action="{{ route('admin.events.store') }}" novalidate>
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Titre</label>
                                <input type="text" 
                                       name="title" 
                                       id="title" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       placeholder="Event Title" 
                                       value="{{ old('title') }}" 
                                       required>
                                <div class="invalid-feedback" id="title-error">
                                    @error('title') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="location">Localisation</label>
                                <input type="text" 
                                       name="location" 
                                       id="location" 
                                       class="form-control @error('location') is-invalid @enderror" 
                                       placeholder="Event Location" 
                                       value="{{ old('location') }}" 
                                       required>
                                <div class="invalid-feedback" id="location-error">
                                    @error('location') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="date">Date</label>
                                <input type="date" 
                                       name="date" 
                                       id="date" 
                                       class="form-control @error('date') is-invalid @enderror" 
                                       value="{{ old('date') }}" 
                                       required>
                                <div class="invalid-feedback" id="date-error">
                                    @error('date') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type_event_id">Type</label>
                                <select name="type_event_id" 
                                        id="type_event_id" 
                                        class="form-control @error('type_event_id') is-invalid @enderror" 
                                        required>
                                    <option value="">Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ old('type_event_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="type-error">
                                    @error('type_event_id') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Réinitialiser</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Script de validation -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('eventForm');
    const title = document.getElementById('title');
    const location = document.getElementById('location');
    const titleError = document.getElementById('title-error');
    const locationError = document.getElementById('location-error');
    const onlyLetters = /^[A-Za-zÀ-ÿ\s]+$/;

    // Vérification en temps réel
    title.addEventListener('input', () => validateTextField(title, titleError, "Le titre"));
    location.addEventListener('input', () => validateTextField(location, locationError, "Le lieu"));

    function validateTextField(input, errorContainer, fieldName) {
        const value = input.value.trim();

        if (value === '') {
            errorContainer.textContent = `${fieldName} est obligatoire.`;
            input.classList.add('is-invalid');
        } else if (!onlyLetters.test(value)) {
            errorContainer.textContent = `${fieldName} doit contenir uniquement des lettres.`;
            input.classList.add('is-invalid');
        } else {
            errorContainer.textContent = '';
            input.classList.remove('is-invalid');
        }
    }

    // Vérification avant soumission
    form.addEventListener('submit', (e) => {
        validateTextField(title, titleError, "Le titre");
        validateTextField(location, locationError, "Le lieu");

        const invalidInputs = form.querySelectorAll('.is-invalid');
        if (invalidInputs.length > 0) {
            e.preventDefault(); // Empêche l’envoi si erreurs
        }
    });
});
</script>

@endsection
