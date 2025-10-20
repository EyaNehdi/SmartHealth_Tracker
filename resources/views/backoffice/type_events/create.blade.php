@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.type_events.index') }}">Type Events</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Type Event</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Add Type Event</h6>
                    <a href="{{ route('admin.type_events.index') }}" class="ms-text-primary">Type Events List</a>
                </div>
                <div class="ms-panel-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.type_events.store') }}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Nom du type</label>
                                <input type="text" name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       placeholder="Nom du type" 
                                       value="{{ old('name') }}" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="name-error" class="invalid-feedback">
                                    Le nom est obligatoire et doit contenir uniquement des lettres.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Reset</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('name');
    const form = nameInput.closest('form');
    const nameError = document.getElementById('name-error');

    // Regex pour lettres et espaces seulement
    const regex = /^[A-Za-zÀ-ÿ\s]+$/;

    // Détection en temps réel
    nameInput.addEventListener('input', function () {
        const value = nameInput.value.trim();

        if (value === '' || !regex.test(value)) {
            nameInput.classList.add('is-invalid');
            nameError.style.display = 'block';
        } else {
            nameInput.classList.remove('is-invalid');
            nameError.style.display = 'none';
        }
    });

    // Validation au submit
    form.addEventListener('submit', function (event) {
        const value = nameInput.value.trim();
        if (value === '' || !regex.test(value)) {
            nameInput.classList.add('is-invalid');
            nameError.style.display = 'block';
            event.preventDefault();
            event.stopPropagation();
        }
    });
});
</script>
@endsection
