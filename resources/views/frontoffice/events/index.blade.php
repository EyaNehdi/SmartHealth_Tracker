@extends('shared.layouts.frontoffice')

@section('page-title', 'Events - SmartHealth Tracker')

@section('content')
{{-- Flash messages --}}
@if(session('success'))
    <div id="flash-message" class="alert alert-success mb-3 mx-auto text-center" style="max-width: 400px;">
        {{ session('success') }}
    </div>
@endif

@if(session('info'))
    <div id="flash-message" class="alert alert-warning mb-3 mx-auto text-center" style="max-width: 400px;">
        {{ session('info') }}
    </div>
@endif

<section class="breadcrumb__area breadcrumb__bg"
    data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="breadcrumb__content">
                    <h2 class="title"> Liste des événements</h2>
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

<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

        @forelse($events as $event)
            <div class="bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden transition transform hover:-translate-y-1 hover:shadow-md">
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

                    <!-- Bouton Participer -->
                    <form action="{{ route('events.participate', $event) }}" method="POST" class="mt-2">
    @csrf
    <button 
        class="px-4 py-2 bg-green-500 text-black font-semibold rounded-lg 
               hover:bg-green-600 hover:text-black transition duration-300 shadow-md">
        Participer
    </button>
</form>

@if(session('qrCode') && session('eventId') == $event->id)
    <div class="mt-3">
        <h4>Votre QR Code Ticket :</h4>
        <div>{!! base64_decode(session('qrCode')) !!}</div>
    </div>
@endif




                    <!-- Barre de progression -->
                    <div class="mt-3 w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $event->participation_percent ?? 0 }}%"></div>
                    </div>
                    <p class="text-sm mt-1">{{ count($event->participants ?? []) }} participants</p>
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

{{-- Script pour faire disparaître le flash message après 6 secondes --}}
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const flash = document.getElementById('flash-message');
        if(flash){
            setTimeout(() => {
                flash.style.transition = "opacity 0.5s ease";
                flash.style.opacity = 0;
                setTimeout(() => flash.remove(), 500);
            }, 6000); // 6000ms = 6 secondes
        }
    });
</script>

@endsection
