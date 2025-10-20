@extends('shared.layouts.frontoffice')

@section('page-title', 'SmartHealth Tracker - Messagerie')

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::id() }}">
</head>
<main>
<div class="container">
    <h2>Messagerie Test</h2>

    <textarea id="message" placeholder="Écris un message..."></textarea><br>
    <button id="sendBtn">Envoyer</button>

    <h3>Messages reçus :</h3>
    <ul id="messages">
        @foreach ($messages as $msg)
            <li>{{ $msg->sender->name }}: {{ $msg->body }}</li>
        @endforeach
    </ul>
</div>
</main>
@endsection

@push('frontoffice-scripts')


@vite(['resources/js/chat.js'])
@endpush
