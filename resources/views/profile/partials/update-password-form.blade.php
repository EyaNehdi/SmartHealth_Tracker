<section>
    <header>
        <h2 class="text-2xl font-bold text-green-700 dark:text-green-300 tracking-tight">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-3 text-base text-gray-600 dark:text-gray-400">
            {{ __('Keep your account secure with a strong, unique password.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-10 space-y-8">
        @csrf
        @method('put')

        <div class="relative">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-base font-semibold text-gray-700 dark:text-gray-300" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm" autocomplete="current-password" placeholder="{{ __('Enter Current Password') }}" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500 dark:text-red-400 font-medium" />
        </div>

        <div class="relative">
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-base font-semibold text-gray-700 dark:text-gray-300" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm" autocomplete="new-password" placeholder="{{ __('Enter New Password') }}" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500 dark:text-red-400 font-medium" />
        </div>

        <div class="relative">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-base font-semibold text-gray-700 dark:text-gray-300" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm" autocomplete="new-password" placeholder="{{ __('Confirm New Password') }}" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500 dark:text-red-400 font-medium" />
        </div>

        <div class="flex items-center gap-6">
            <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl px-8 py-3 transition duration-200 shadow-md hover:shadow-lg">
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-base font-semibold text-green-600 dark:text-green-400"
                >{{ __('Password Updated!') }}</p>
            @endif
        </div>
    </form>
</section>
