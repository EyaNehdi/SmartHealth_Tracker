<x-app-layout>
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb__content">
                        <h2 class="title"> Profil</h2>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="/">Home</a>
                            </span>
                            <span class="breadcrumb-separator">|</span>
                            <span property="itemListElement" typeof="ListItem">Profil</span>
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
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-green-700 dark:text-green-300 leading-tight tracking-tight">
            {{ __('Your Fitness Profile') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Manage your account to stay on track with your health and sport goals.') }}
        </p>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-2xl rounded-2xl transition-all duration-300 hover:shadow-3xl border-l-4 border-green-500">
                <div class="max-w-2xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-2xl rounded-2xl transition-all duration-300 hover:shadow-3xl border-l-4 border-blue-500">
                <div class="max-w-2xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white dark:bg-gray-800 shadow-2xl rounded-2xl transition-all duration-300 hover:shadow-3xl border-l-4 border-red-500">
                <div class="max-w-2xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
