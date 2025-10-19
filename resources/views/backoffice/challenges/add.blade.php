@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11 col-md-12">

            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.challenges.index') }}">Challenges</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Créer un Challenge</li>
                </ol>
            </nav>

            <h2 class="mb-4">Créer un Nouveau Challenge</h2>

            <form method="POST" action="{{ route('admin.challenges.store') }}" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row">
                    <!-- Image Upload & Preview -->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Image du Challenge (Optionnel)</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border rounded p-2 d-flex justify-content-center align-items-center" style="height: 280px; background-color: #fafafa;">
                            <img id="imagePreview" src="{{ asset('assets2/img/challenge-placeholder.png') }}" alt="Image Preview" class="img-fluid" style="max-height: 270px;">
                        </div>

                        <small class="form-text text-muted mt-2">Formats supportés : JPG, PNG. Taille max : 2MB.</small>
                    </div>

                    <!-- Form Fields for Challenge -->
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="titre" class="font-weight-bold">Titre du Challenge <span class="text-danger">*</span></label>
                            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" placeholder="Entrez le titre du challenge" value="{{ old('titre') }}" required>
                            @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dateDebut" class="font-weight-bold">Date de Début <span class="text-danger">*</span></label>
                                <input type="date" name="dateDebut" id="dateDebut" class="form-control @error('dateDebut') is-invalid @enderror" value="{{ old('dateDebut') }}" required>
                                @error('dateDebut')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="dateFin" class="font-weight-bold">Date de Fin <span class="text-danger">*</span></label>
                                <input type="date" name="dateFin" id="dateFin" class="form-control @error('dateFin') is-invalid @enderror" value="{{ old('dateFin') }}" required>
                                @error('dateFin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="participants" class="font-weight-bold">Participants</label>
                            <select name="participants[]" id="participants" class="form-control @error('participants') is-invalid @enderror" multiple>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ in_array($user->id, old('participants', [])) ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('participants')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs utilisateurs.</small>
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea name="description" id="description" rows="6" class="form-control form-control-lg @error('description') is-invalid @enderror" placeholder="Entrez une description détaillée du challenge">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="reset" class="btn btn-outline-warning px-4">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Display Existing Challenges -->
            <div class="mt-5">
                <h3>Vos Challenges</h3>
                @if ($challenges->isEmpty())
                    <p>Aucun challenge créé pour le moment.</p>
                @else
                    <ul class="list-group">
                        @foreach ($challenges as $challenge)
                            <li class="list-group-item">
                                <strong>{{ $challenge->titre }}</strong> ({{ $challenge->participations_count }} participants)
                                <br>
                                <small>Du {{ $challenge->dateDebut->format('d M Y') }} au {{ $challenge->dateFin->format('d M Y') }}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Display Participations -->
            <div class="mt-5">
                <h3>Vos Participations</h3>
                @if ($participations->isEmpty())
                    <p>Vous ne participez à aucun challenge.</p>
                @else
                    <ul class="list-group">
                        @foreach ($participations as $participation)
                            <li class="list-group-item">
                                <strong>{{ $participation->challenge->titre }}</strong> (Créé par {{ $participation->challenge->creator->name }})
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const preview = document.getElementById('imagePreview');
        preview.src = "{{ asset('assets2/img/challenge-placeholder.png') }}";
    });
</script>

@endsection
