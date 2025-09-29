<section class="space-y-8">
    <header>
        <h2 class="text-2xl font-bold text-green-700 dark:text-green-300 tracking-tight">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-3 text-base text-gray-600 dark:text-gray-400">
            {{ __('Permanently delete your account and all associated data. Download any important information before proceeding.') }}
        </p>
    </header>

    {{-- 🔹 Logout Button --}}
    <form method="POST" action="{{ route('profile.destroy')  }}">
        @csrf
        <x-secondary-button class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-xl px-8 py-3 transition duration-200 shadow-md hover:shadow-lg">
            {{ __('Logout') }}
        </x-secondary-button>
    </form>

    {{-- 🔹 Delete Account Button --}}
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl px-8 py-3 transition duration-200 shadow-md hover:shadow-lg"
    >{{ __('Delete Account') }}</x-danger-button>

    {{-- Confirm Deletion Modal --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 max-w-lg mx-auto">
        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">
                {{ __('Confirm Account Deletion') }}
            </h2>

            <p class="mt-3 text-base text-gray-600 dark:text-gray-400">
                {{ __('This action is permanent. Enter your password to confirm you want to delete your account.') }}
            </p>

            <div class="relative">
                <x-input-label for="password" value="{{ __('Password') }}" class="text-base font-semibold text-gray-700 dark:text-gray-300" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm"
                    placeholder="{{ __('Enter Your Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500 dark:text-red-400 font-medium" />
            </div>

            <div class="mt-6 flex justify-end gap-6">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-gray-200 font-semibold rounded-xl px-8 py-3 transition duration-200 shadow-md hover:shadow-lg">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl px-8 py-3 transition duration-200 shadow-md hover:shadow-lg">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
