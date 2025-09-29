@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des types d'événements</li>
                </ol>
            </nav>
        </div>

        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome d-flex justify-content-between align-items-center">
                    <h6>Types d'événements</h6>
                    <a href="{{ route('admin.type_events.create') }}" class="btn btn-primary btn-sm">➕ Ajouter un type</a>
                </div>

                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->name }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('admin.type_events.edit', $type) }}" class="btn btn-warning btn-sm">✏ Modifier</a>

                                            <form action="{{ route('admin.type_events.destroy', $type) }}" method="POST" onsubmit="return confirm('Supprimer ce type ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">🗑 Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($types->isEmpty())
                            <p class="text-center mt-3">Aucun type d'événement trouvé.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
