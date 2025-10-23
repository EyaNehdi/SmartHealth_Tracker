{{-- resources/views/frontoffice/preferences/create.blade.php --}}
@extends('shared.layouts.frontoffice')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Vos Préférences d'Activités</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('preferences.store') }}">
                        @csrf
                        <p>Sélectionnez vos centres d'intérêt pour recevoir des recommandations personnalisées :</p>
                        
                        <div class="row">
                            @foreach($popularTags as $tag)
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="preferences[]" 
                                           value="{{ $tag }}" id="pref_{{ $tag }}">
                                    <label class="form-check-label" for="pref_{{ $tag }}">
                                        {{ ucfirst($tag) }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">
                            Enregistrer mes préférences
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection