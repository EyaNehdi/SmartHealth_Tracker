@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Équipements</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Liste des Équipements</h6>
                    <a href="{{ route('admin.equipments.create') }}" class="ms-text-primary">Ajouter un Équipement</a>
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
                    @if ($equipments->isEmpty())
                        <p>Aucun équipement disponible.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Marque</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">État</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipments as $equipment)
                                        <tr>
                                            <td>{{ $equipment->nom }}</td>
                                            <td>{{ ucfirst($equipment->type) }}</td>
                                            <td>{{ $equipment->marque ?? 'N/A' }}</td>
                                            <td>
                                                @if ($equipment->image)
                                                    <img src="{{ asset('storage/' . $equipment->image) }}" alt="{{ $equipment->nom }}" style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($equipment->etat) }}</td>
                                            <td>{{ Str::limit($equipment->description ?? 'N/A', 50) }}</td>
                                            <td>
                                                <a href="{{ route('admin.equipments.edit', $equipment->id) }}" class="btn btn-sm btn-primary" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?');">
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
    .table-responsive {
        margin-top: 20px;
    }
    .table th, .table td {
        vertical-align: middle;
        padding: 12px;
    }
    .table th {
        background-color: #f1f1f1;
        font-weight: 600;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 5px 10px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        padding: 5px 10px;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }
    .alert-dismissible {
        margin-bottom: 1.5rem;
    }
    .alert .btn-close {
        position: absolute;
        top: 0.75rem;
        right: 1rem;
    }
    .ms-text-primary {
        color: #007bff;
        font-weight: 500;
    }
    img {
        object-fit: cover;
        border-radius: 4px;
    }
</style>
@endsection