@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Events List</li>
                </ol>
            </nav>
        </div>

        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome d-flex justify-content-between align-items-center">
                    <h6>Liste des Events</h6>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">➕ Ajouter Event</a>
                </div>

                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Titre</th>
                                    <th>Localisation</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Jours restants</th>
                                    <th>Mois</th>
                                    <th>Trimestre</th>
                                    <th>Jour de la semaine</th>
                                    <th>Participants</th> <!-- Nouvelle colonne -->
                                    <th>Progression</th> <!-- Nouvelle colonne -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->date->format('d/m/Y') }}</td>
                                        <td>{{ optional($event->typeEvent)->name ?? 'Not defined' }}</td>
                                        <td>{{ $event->days_until_event }}</td>
                                        <td>{{ $event->month }}</td>
                                        <td>{{ $event->quarter }}</td>
                                        <td>{{ $event->week_day }}</td>
                                        <td>{{ count($event->participants ?? []) }}</td>
                                        <td style="min-width: 120px;">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar" 
                                                     style="width: {{ $event->participation_percent ?? 0 }}%;" 
                                                     aria-valuenow="{{ $event->participation_percent ?? 0 }}" 
                                                     aria-valuemin="0" aria-valuemax="100">
                                                    {{ $event->participation_percent ?? 0 }}%
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('admin.events.edit', $event) }}" 
                                               class="btn btn-warning btn-sm">✏ Modifier</a>

                                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Delete this event?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">🗑 Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($events->isEmpty())
                            <p class="text-center mt-3">No events found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
