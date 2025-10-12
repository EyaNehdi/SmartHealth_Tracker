@extends('shared.layouts.frontoffice')

@section('content')
<h2>Ajouter une Participation</h2>

<a href="{{ route('participations.index') }}">← Retour à la liste</a>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('participations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-grp">
        <label for="challenge_id">Challenge *</label>
        <select name="challenge_id" required>
            <option value="">-- Sélectionnez un challenge --</option>
            @foreach($challenges as $challenge)
                <option value="{{ $challenge->id }}" {{ old('challenge_id') == $challenge->id ? 'selected' : '' }}>
                    {{ $challenge->titre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-grp">
        <label for="user_id">Participant *</label>
        <select name="user_id" required>
            <option value="">-- Sélectionnez un utilisateur --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-grp">
        <label for="comment">Commentaire</label>
        <textarea name="comment" rows="3" placeholder="Votre commentaire">{{ old('comment') }}</textarea>
    </div>

    <div class="form-grp">
        <label for="image">Image (optionnel)</label>
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit">Ajouter</button>
</form>
@endsection
