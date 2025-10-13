<form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: none;">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="form-grp">
        <label for="name">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="{{ __('Your Full Name') }}" />
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-grp">
        <label for="email">{{ __('Email') }}</label>
        <input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" placeholder="{{ __('Your Email Address') }}" />
        @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-3">
                <p class="text-muted">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="btn btn-link p-0 text-primary">
                        {{ __('Resend Verification Email') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2">
                        {{ __('A new verification link has been sent to your email.') }}
                    </div>
                @endif
            </div>
        @endif
    </div>

    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="tg-btn tg-btn-three">
            {{ __('Save Changes') }}
        </button>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success mb-0">
                {{ __('Profile Updated!') }}
            </div>
        @endif
    </div>
</form>
