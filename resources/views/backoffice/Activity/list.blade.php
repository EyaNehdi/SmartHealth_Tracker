
@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Activités</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Liste des Activités</h6>
                    <a href="{{ route('admin.activities.create') }}" class="ms-text-primary">Ajouter une Activité</a>
                </div>
                <div class="ms-panel-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                    @if ($activities->isEmpty())
                        <p>Aucune activité disponible.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Catégorie</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date de début</th>
                                        <th scope="col">Date de fin</th>
                                        <th scope="col">Durée</th>
                                        <th scope="col">Prix (€)</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Support PDF</th>
                                        <th scope="col">Support Vidéo</th>
                                        <th scope="col">Équipements</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>{{ $activity->nom }}</td>
                                            <td>{{ $activity->category ? $activity->category->name : 'Non défini' }}</td>
                                            <td>{{ Str::limit($activity->description ?? 'N/A', 50) }}</td>
                                            <td>{{ $activity->date_debut ? $activity->date_debut->format('d/m/Y H:i') : 'Non défini' }}</td>
                                            <td>{{ $activity->date_fin ? $activity->date_fin->format('d/m/Y H:i') : 'Non défini' }}</td>
                                            <td>{{ $activity->duree ? $activity->duree . ' min' : 'Non définie' }}</td>
                                            <td>{{ $activity->prix ? number_format($activity->prix, 2) : 'N/A' }}</td>
                                            <td>
                                                @if ($activity->image)
                                                    <img src="{{ Storage::url($activity->image) }}" alt="{{ $activity->nom }}" style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                                @else
                                                    Aucun
                                                @endif
                                            </td>
                                            <td>
                                                @if ($activity->support_pdf)
                                                    <a href="{{ Storage::url($activity->support_pdf) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-file-pdf"></i> Voir PDF
                                                    </a>
                                                @else
                                                    Aucun
                                                @endif
                                            </td>
                                            <td>
                                                @if ($activity->support_video)
                                                    <a href="{{ Storage::url($activity->support_video) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-video"></i> Voir Vidéo
                                                    </a>
                                                @else
                                                    Aucun
                                                @endif
                                            </td>
                                            <td>
                                                @if ($activity->equipments->isNotEmpty())
                                                    {{ Str::limit(implode(', ', $activity->equipments->pluck('nom')->toArray()), 50) }}
                                                @else
                                                    Aucun
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.activities.edit', $activity->id) }}" class="btn btn-sm btn-primary" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

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
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-outline-primary {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .btn-outline-primary i {
        margin-right: 5px;
    }
</style>
@endsection
