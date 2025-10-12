@extends('shared.layouts.frontoffice')

@section('page-title', 'Edit Participation - SmartHealth Tracker')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Participation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('participations.update', $participation) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="challenge_id">{{ __('Challenge') }}</label>
                            <select name="challenge_id" id="challenge_id" class="form-control @error('challenge_id') is-invalid @enderror" required>
                                <option value="">Select a challenge</option>
                                @foreach($challenges as $challenge)
                                    <option value="{{ $challenge->id }}" {{ $participation->challenge_id == $challenge->id ? 'selected' : '' }}>
                                        {{ $challenge->titre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('challenge_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id">{{ __('User') }}</label>
                            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                <option value="">Select a user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $participation->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="comment">{{ __('Comment') }}</label>
                            <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" rows="3">{{ old('comment', $participation->comment) }}</textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if($participation->image)
                                <small class="form-text text-muted">Current image: <a href="{{ Storage::url($participation->image) }}" target="_blank">View</a></small>
                            @endif
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Participation') }}
                            </button>
                            <a href="{{ route('participations.index') }}" class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
