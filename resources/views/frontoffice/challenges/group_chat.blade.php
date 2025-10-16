@extends('shared.layouts.frontoffice')

@section('page-title', 'Group Chat for Challenge: {{ $challenge->titre }}')

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::id() }}">
    <meta name="challenge-id" content="{{ $challenge->id }}"> <!-- New: Pass challenge ID -->
</head>
<main>
<div class="container">
    <h2>Group Chat for {{ $challenge->titre }}</h2>

    <textarea id="message" placeholder="Écris un message..."></textarea><br>
    <button id="sendBtn">Envoyer</button>

    <h3>Messages du groupe :</h3>
    <ul id="messages">
        @foreach ($messages as $msg)
            <li>{{ $msg->sender->name }}: {{ $msg->body }}</li>
        @endforeach
    </ul>
</div>
</main>
@endsection

@push('frontoffice-scripts')

@endpush
