
@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11 col-md-12">

            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Challenges</li>
                </ol>
            </nav>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="mb-4">Liste des Challenges</h2>

            <div class="mb-4">
                <form method="GET" action="{{ route('admin.challenges.index') }}">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Rechercher un challenge..." value="{{ $search }}">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>

            <h3>Tous les Challenges</h3>
            @if ($allChallenges->isEmpty())
                <p>Aucun challenge trouvé.</p>
            @else
                <ul class="list-group mb-4">
                    @foreach ($allChallenges as $challenge)
                        <li class="list-group-item {{ $challenge->participations_count > 5 ? 'bg-light' : '' }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $challenge->titre }}</strong> ({{ $challenge->participations_count }} participants)
                                    @if ($challenge->is_famous)
                                        <span class="badge bg-primary">Challenge Célèbre</span>
                                    @elseif ($challenge->participations_count > 5)
                                        <span class="badge badge-success">Challenge Populaire</span>
                                    @endif
                                    <br>
                                    <small>Créé par {{ $challenge->creator->name }} | Du {{ $challenge->dateDebut->format('d M Y') }} au {{ $challenge->dateFin->format('d M Y') }}</small>
                                </div>
                                @if (auth()->user()->isAdmin())
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('admin.challenges.toggleFamous', $challenge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-{{ $challenge->is_famous ? 'warning' : 'info' }} btn-sm"
                                                    onclick="return confirm('{{ $challenge->is_famous ? 'Retirer le statut Célèbre de ce challenge ?' : 'Marquer ce challenge comme Célèbre ?' }}')">
                                                <i class="fas fa-star"></i> {{ $challenge->is_famous ? 'Retirer Célèbre' : 'Marquer Célèbre' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.challenges.destroy', $challenge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce challenge ?')">
                                                <i class="fas fa-trash-alt"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            <h3>Challenge le Plus Populaire</h3>
            @if ($mostParticipated)
                <div class="card">
                    <div class="card-body">
                        <strong>{{ $mostParticipated->titre }}</strong> ({{ $mostParticipated->participations_count }} participants)
                        @if ($mostParticipated->is_famous)
                            <span class="badge bg-primary">Challenge Célèbre</span>
                        @endif
                        <br>
                        <small>Créé par {{ $mostParticipated->creator->name }}</small>
                    </div>
                </div>
            @else
                <p>Aucun challenge populaire trouvé.</p>
            @endif

            <h3>Vos Challenges</h3>
            @if ($challenges->isEmpty())
                <p>Aucun challenge créé pour le moment.</p>
            @else
                <ul class="list-group">
                    @foreach ($challenges as $challenge)
                        <li class="list-group-item {{ $challenge->participations_count > 5 ? 'bg-light' : '' }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $challenge->titre }}</strong> ({{ $challenge->participations_count }} participants)
                                    @if ($challenge->is_famous)
                                        <span class="badge bg-primary">Challenge Célèbre</span>
                                    @elseif ($challenge->participations_count > 5)
                                        <span class="badge badge-success">Challenge Populaire</span>
                                    @endif
                                    <br>
                                    <small>Créé par {{ $challenge->creator->name }} | Du {{ $challenge->dateDebut->format('d M Y') }} au {{ $challenge->dateFin->format('d M Y') }}</small>
                                </div>
                                @if (auth()->user()->isAdmin())
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('admin.challenges.toggleFamous', $challenge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-{{ $challenge->is_famous ? 'warning' : 'info' }} btn-sm"
                                                    onclick="return confirm('{{ $challenge->is_famous ? 'Retirer le statut Célèbre de ce challenge ?' : 'Marquer ce challenge comme Célèbre ?' }}')">
                                                <i class="fas fa-star"></i> {{ $challenge->is_famous ? 'Retirer Célèbre' : 'Marquer Célèbre' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.challenges.destroy', $challenge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce challenge ?')">
                                                <i class="fas fa-trash-alt"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection

