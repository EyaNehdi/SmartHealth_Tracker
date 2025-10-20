@extends('shared.layouts.frontoffice')

@section('page-title', 'Add Activity - SmartHealth Tracker')

@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb__content">
                        <h2 class="title">Activities</h2>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator">|</span>
                            <span property="itemListElement" typeof="ListItem">Activities</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="section__bg-shape">
            <span class="bottom-shape" data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area / form -->
    <section class="contact__area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact__form-wrap">
                        <div class="container mt-5">
                            <h2 class="mb-4 text-center">Ajouter une Activité</h2>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('activities.store') }}">
                                @csrf

                                <!-- Nom -->
                                <div class="form-grp mb-3">
                                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-grp mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="form-grp mb-3">
                                    <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', now()->format('Y-m-d\TH:i')) }}" required>
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Durée -->
                                <div class="form-grp mb-3">
                                    <label for="duree" class="form-label">Durée (en minutes)</label>
                                    <input type="number" name="duree" id="duree" class="form-control @error('duree') is-invalid @enderror" value="{{ old('duree') }}" min="0">
                                    @error('duree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Equipments -->
                                <div class="form-grp mb-3">
                                    <label for="equipments" class="form-label">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px;">
                                            <path d="M3 9h12" stroke="#6b7280" stroke-width="2" stroke-linecap="round"/>
                                            <path d="M9 3v12" stroke="#6b7280" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                        Équipements utilisés
                                    </label>
                                    <select name="equipments[]" id="equipments" class="form-control @error('equipments') is-invalid @enderror" multiple>
                                        @foreach ($equipments as $equipment)
                                            <option value="{{ $equipment->id }}" {{ in_array($equipment->id, old('equipments', [])) ? 'selected' : '' }}>
                                                {{ $equipment->nom }} ({{ $equipment->type }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('equipments')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Commentaire équipements -->
                                <div class="form-grp mb-3">
                                    <label for="equipment_comment" class="form-label">Commentaire sur l’utilisation des équipements</label>
                                    <textarea name="equipment_comment" id="equipment_comment" class="form-control @error('equipment_comment') is-invalid @enderror" rows="4">{{ old('equipment_comment') }}</textarea>
                                    @error('equipment_comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="text-center">
                                    <button type="submit" class="tg-btn tg-btn-three black-btn">Ajouter</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>
@endsection

@section('scripts')
<script>
    // Assurez-vous que jQuery est chargé avant d'exécuter ces scripts
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof sal !== 'undefined') { sal(); }
        if (typeof tgCursor !== 'undefined') { tgCursor(); }
    });
</script>
@endsection
