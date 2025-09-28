<section>
    <header>
        <h2 class="text-2xl font-bold text-green-700 dark:text-green-300 tracking-tight">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-3 text-base text-gray-600 dark:text-gray-400">
            {{ __("Update your personal details to keep your fitness journey on track.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="mt-8">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-10 space-y-8">
        @csrf
        @method('patch')

        <div class="relative">
            <x-input-label for="name" :value="__('Name')" class="text-base font-semibold text-gray-700 dark:text-gray-300" />
            <x-text-input id="name" name="name" type="text" class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="{{ __('Your Full Name') }}" />
            <x-input-error class="mt-2 text-red-500 dark:text-red-400 font-medium" :messages="$errors->get('name')" />
        </div>

        <div class="relative">
            <x-input-label for="email" :value="__('Email')" class="text-base font-semibold text-gray-700 dark:text-gray-300" />
            <x-text-input id="email" name="email" type="email" class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm" :value="old('email', $user->email)" required autocomplete="username" placeholder="{{ __('Your Email Address') }}" />
            <x-input-error class="mt-2 text-red-500 dark:text-red-400 font-medium" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-6">
                    <p class="text-base text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-base text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 transition duration-200">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-3 font-semibold text-base text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-6">
            <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl px-8 py-3 transition duration-200 shadow-md hover:shadow-lg">
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-base font-semibold text-green-600 dark:text-green-400"
                >{{ __('Profile Updated!') }}</p>
            @endif
        </div>
    </form>
</section>
