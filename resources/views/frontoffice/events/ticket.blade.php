@extends('shared.layouts.front')

@section('content')
<div class="container mt-5">
    <h2>Ticket pour {{ $event->nomEvent }}</h2>
    <p>Participant : {{ $user->name }}</p>
    <p>Lieu : {{ $event->lieu }}</p>
    <p>Date : {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>

    <h4>QR Code :</h4>
    <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code du ticket">

    <p class="mt-3 text-success">{{ session('success') }}</p>
</div>
@endsection
