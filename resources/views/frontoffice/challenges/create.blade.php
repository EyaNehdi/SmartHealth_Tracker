@extends('shared.layouts.frontoffice')

@section('page-title', 'Créer un Objectif - SmartHealth Tracker')

@section('content')

    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Ajouter un Objectif</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="/">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Objectifs</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__bg-shape">
                <span class="bottom-shape"
                    data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-4">Vos Objectifs</h3>
                        @if ($challenges->isEmpty())
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>Vous n'avez pas encore créé d'objectif. Commencez
                                maintenant !
                            </div>
                        @else
                            @foreach ($challenges as $challenge)
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $challenge->titre }}</h4>
                                        @if ($challenge->image)
                                            <img src="{{ asset('storage/' . $challenge->image) }}"
                                                alt="{{ $challenge->titre }}" class="img-fluid rounded mb-3"
                                                style="max-height: 200px;">
                                        @endif
                                        <p class="card-text">{{ $challenge->description }}</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <i class="fas fa-calendar-alt me-2"></i>
                                                <strong>Période :</strong> {{ $challenge->dateDebut->format('d/m/Y') }} -
                                                {{ $challenge->dateFin->format('d/m/Y') }}
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fas fa-users me-2"></i>
                                                <strong>Participants :</strong> {{ $challenge->participations_count }}
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fas fa-user me-2"></i>
                                                <strong>Créé par :</strong> {{ $challenge->creator->name }}
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fas fa-clock me-2"></i>
                                                <strong>Créé le :</strong>
                                                {{ $challenge->created_at->format('d/m/Y H:i') }}
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fas fa-chart-line me-2"></i>
                                                <strong>Progression :</strong>
                                                @php
                                                    $now = now();
                                                    $start = $challenge->dateDebut;
                                                    $end = $challenge->dateFin;
                                                    $totalDays = $start->diffInDays($end);
                                                    $progress =
                                                        $totalDays > 0
                                                            ? min(100, ($start->diffInDays($now) / $totalDays) * 100)
                                                            : 0;
                                                    $status =
                                                        $now < $start
                                                            ? 'Non commencé'
                                                            : ($now > $end
                                                                ? 'Terminé'
                                                                : 'En cours');
                                                @endphp
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ $progress }}%;"
                                                        aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        {{ round($progress) }}%
                                                    </div>
                                                </div>
                                                <small class="text-muted">{{ $status }}</small>
                                            </li>
                                        </ul>
                                        <div class="mt-3 d-flex gap-2">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#participantsModal{{ $challenge->id }}">
                                                Voir les Participants
                                            </button>
                                            @if (auth()->id() === $challenge->created_by && !$challenge->is_famous)
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $challenge->id }}"
                                                    onclick="populateEditForm({{ $challenge->id }})">
                                                    Modifier
                                                </button>
                                                <form action="{{ route('challenges.destroy', $challenge->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet objectif ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            @elseif ($challenge->is_famous)
                                                <span class="badge bg-primary">Challenge Célèbre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Participants Modal -->
                                <div class="modal fade" id="participantsModal{{ $challenge->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Participants de {{ $challenge->titre }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($challenge->participations->count() > 0)
                                                    <div class="table-responsive">
                                                        <table class="table table-striped align-middle">
                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th>Nom d'Utilisateur</th>
                                                                    <th>Email</th>
                                                                    <th>Commentaire</th>
                                                                    <th>Réponse</th>
                                                                    <th>Image</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($challenge->participations as $participation)
                                                                    <tr>
                                                                        <td>{{ $participation->user->name }}</td>
                                                                        <td>{{ $participation->user->email }}</td>
                                                                        <td>{{ $participation->comment ?? '-' }}</td>
                                                                        <td>
                                                                            @if ($participation->reply)
                                                                                <small
                                                                                    class="text-muted d-block mb-2">Réponse
                                                                                    : {{ $participation->reply }}</small>
                                                                            @endif
                                                                            @if (auth()->id() === $challenge->created_by)
                                                                                <form
                                                                                    action="{{ route('participation.reply', $participation->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="input-group input-group-sm">
                                                                                        <input type="text" name="reply"
                                                                                            class="form-control"
                                                                                            placeholder="Écrivez une réponse...">
                                                                                        <button
                                                                                            class="btn btn-outline-primary"
                                                                                            type="submit">Envoyer</button>
                                                                                    </div>
                                                                                </form>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($participation->image)
                                                                                <img src="{{ asset('storage/' . $participation->image) }}"
                                                                                    alt="Image" class="img-thumbnail"
                                                                                    width="60">
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p class="text-muted">Aucun participant pour le moment.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $challenge->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modifier l'Objectif : {{ $challenge->titre }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('challenges.update', $challenge->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group mb-3">
                                                        <label for="edit_titre_{{ $challenge->id }}"
                                                            class="form-label fw-bold">Titre <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="titre"
                                                            id="edit_titre_{{ $challenge->id }}"
                                                            class="form-control @error('titre') is-invalid @enderror"
                                                            value="{{ $challenge->titre }}">
                                                        @error('titre')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <small class="form-text text-muted">Donnez un titre accrocheur et
                                                            précis.</small>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="edit_description_{{ $challenge->id }}"
                                                            class="form-label fw-bold">Description <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="description" id="edit_description_{{ $challenge->id }}"
                                                            class="form-control @error('description') is-invalid @enderror" rows="5">{{ $challenge->description }}</textarea>
                                                        @error('description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <small class="form-text text-muted">Expliquez ce que les
                                                            participants doivent faire.</small>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="edit_image_{{ $challenge->id }}"
                                                            class="form-label fw-bold">Image (Optionnelle)</label>
                                                        <input type="file" name="image"
                                                            id="edit_image_{{ $challenge->id }}"
                                                            class="form-control @error('image') is-invalid @enderror"
                                                            accept="image/*"
                                                            onchange="previewEditImage(event, '{{ $challenge->id }}')">
                                                        @error('image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <small class="form-text text-muted">Formats acceptés : JPG, PNG,
                                                            JPEG. Taille max : 2MB</small>
                                                        <div class="mt-2">
                                                            <img id="edit_imagePreview_{{ $challenge->id }}"
                                                                src="{{ $challenge->image ? asset('storage/' . $challenge->image) : '#' }}"
                                                                alt="Prévisualisation" class="img-thumbnail"
                                                                style="display: {{ $challenge->image ? 'block' : 'none' }}; max-height: 200px; border-radius: 8px;">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="edit_dateDebut_{{ $challenge->id }}"
                                                                class="form-label fw-bold">Date de Début <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="dateDebut"
                                                                id="edit_dateDebut_{{ $challenge->id }}"
                                                                class="form-control @error('dateDebut') is-invalid @enderror"
                                                                value="{{ $challenge->dateDebut->format('Y-m-d') }}">
                                                            @error('dateDebut')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="edit_dateFin_{{ $challenge->id }}"
                                                                class="form-label fw-bold">Date de Fin <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="dateFin"
                                                                id="edit_dateFin_{{ $challenge->id }}"
                                                                class="form-control @error('dateFin') is-invalid @enderror"
                                                                value="{{ $challenge->dateFin->format('Y-m-d') }}">
                                                            @error('dateFin')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="d-flex gap-3">
                                                        <button type="reset"
                                                            class="btn btn-outline-secondary w-50">Réinitialiser</button>
                                                        <button type="submit" class="btn btn-primary w-50">Mettre à
                                                            jour</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-lg-6">
                        <div class="contact__form-wrap p-4 bg-light rounded shadow-sm">
                            <h2 class="title mb-4">Créer un Nouvel Objectif</h2>
                            <p class="mb-4">Motivez-vous et vos amis en créant un objectif clair et inspirant. Ajoutez
                                une description détaillée et une image attrayante pour donner vie à votre défi !</p>
                            <form method="POST" action="{{ route('challenges.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="titre" class="form-label fw-bold">Titre <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="titre" id="titre"
                                        class="form-control @error('titre') is-invalid @enderror"
                                        placeholder="Ex: Perdre 5kg en 1 mois" value="{{ old('titre') }}">
                                    @error('titre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Donnez un titre accrocheur et précis.</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description" class="form-label fw-bold">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                        rows="5" placeholder="Décrivez les règles, les motivations et les détails de votre objectif...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Expliquez ce que les participants doivent
                                        faire.</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image" class="form-label fw-bold">Image (Optionnelle)</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                        onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Formats acceptés : JPG, PNG, JPEG. Taille max :
                                        2MB</small>
                                    <div class="mt-2">
                                        <img id="imagePreview" src="#" alt="Prévisualisation"
                                            class="img-thumbnail"
                                            style="display: none; max-height: 200px; border-radius: 8px;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="dateDebut" class="form-label fw-bold">Date de Début <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="dateDebut" id="dateDebut"
                                            class="form-control @error('dateDebut') is-invalid @enderror"
                                            value="{{ old('dateDebut') }}" min="{{ date('Y-m-d') }}">
                                        @error('dateDebut')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="dateFin" class="form-label fw-bold">Date de Fin <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="dateFin" id="dateFin"
                                            class="form-control @error('dateFin') is-invalid @enderror"
                                            value="{{ old('dateFin') }}" min="{{ old('dateDebut', date('Y-m-d')) }}">
                                        @error('dateFin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex gap-3">
                                    <button type="reset" class="btn btn-outline-secondary w-50">Réinitialiser</button>
                                    <button type="submit" class="btn btn-primary w-50">Créer l'Objectif</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@push('frontoffice-scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }

        function previewEditImage(event, challengeId) {
            const input = event.target;
            const preview = document.getElementById('edit_imagePreview_' + challengeId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }

        // Ensure end date is after start date for create form
        document.getElementById('dateDebut').addEventListener('change', function() {
            document.getElementById('dateFin').min = this.value;
        });

        // Ensure end date is after start date for edit forms
        document.querySelectorAll('[id^="edit_dateDebut_"]').forEach(function(startInput) {
            startInput.addEventListener('change', function() {
                const challengeId = this.id.replace('edit_dateDebut_', '');
                document.getElementById('edit_dateFin_' + challengeId).min = this.value;
            });
        });
    </script>
@endpush
