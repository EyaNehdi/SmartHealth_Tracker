@extends('shared.layouts.frontoffice')

@section('page-title', 'Events - SmartHealth Tracker')

@section('content')
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb__content">
                        <h2 class="title"> Liste des evénements</h2>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="/">Home</a>
                            </span>
                            <span class="breadcrumb-separator">|</span>
                            <span property="itemListElement" typeof="ListItem">Evenements</span>
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
        <h2 class="text-2xl font-bold text-gray-800">
            📅 Événements à venir
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @forelse($events as $event)
                <div
                    class="bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden transition transform hover:-translate-y-1 hover:shadow-md">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-black">{{ $event->title }}</h3>
                            @if ($event->typeEvent)
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-500 text-white">
                                    {{ $event->typeEvent->name }}
                                </span>
                            @endif
                        </div>

                        <p class="text-gray-800 mb-1">
                            📍 {{ $event->location }}
                        </p>
                        <p class="text-gray-800 mb-3">
                            📆 {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                        </p>


                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full">Aucun événement trouvé.</p>
            @endforelse

        </div>

        <div class="mt-6 flex justify-center">
            {{ $events->links() }}
        </div>
    </div>
@endsection
