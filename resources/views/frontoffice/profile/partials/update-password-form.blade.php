<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="form-grp">
        <label for="update_password_current_password">{{ __('Current Password') }}</label>
        <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" placeholder="{{ __('Enter Current Password') }}" />
        @error('current_password', 'updatePassword')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-grp">
        <label for="update_password_password">{{ __('New Password') }}</label>
        <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" placeholder="{{ __('Enter New Password') }}" />
        @error('password', 'updatePassword')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-grp">
        <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" placeholder="{{ __('Confirm New Password') }}" />
        @error('password_confirmation', 'updatePassword')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="tg-btn tg-btn-three">
            {{ __('Update Password') }}
        </button>

        @if (session('status') === 'password-updated')
            <div class="alert alert-success mb-0">
                {{ __('Password Updated!') }}
            </div>
        @endif
    </div>
</form>
