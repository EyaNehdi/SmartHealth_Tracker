<!-- resources/views/admin/Equipments/edit.blade.php -->
@extends('layouts.adminLayout')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.equipments.list') }}">Équipements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier un Équipement</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Modifier un Équipement</h6>
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
                    <form class="needs-validation" method="POST" action="{{ route('admin.equipments.update', $equipment) }}" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom">Nom *</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrer le nom de l'équipement" value="{{ old('nom', $equipment->nom) }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type">Type *</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                    <option value="cardio" {{ old('type', $equipment->type) == 'cardio' ? 'selected' : '' }}>Cardio</option>
                                    <option value="musculation" {{ old('type', $equipment->type) == 'musculation' ? 'selected' : '' }}>Musculation</option>
                                    <option value="rééducation" {{ old('type', $equipment->type) == 'rééducation' ? 'selected' : '' }}>Rééducation</option>
                                    <option value="autre" {{ old('type', $equipment->type) == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Entrer une description">{{ old('description', $equipment->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="statut">Statut *</label>
                                <select name="statut" id="statut" class="form-control @error('statut') is-invalid @enderror" required>
                                    <option value="disponible" {{ old('statut', $equipment->statut) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="indisponible" {{ old('statut', $equipment->statut) == 'indisponible' ? 'selected' : '' }}>Indisponible</option>
                                </select>
                                @error('statut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Réinitialiser</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
