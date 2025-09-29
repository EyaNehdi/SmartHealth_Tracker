@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Events List</li>
                </ol>
            </nav>
        </div>

        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome d-flex justify-content-between align-items-center">
                    <h6>Events List</h6>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">➕ Add Event</a>
                    
                </div>

                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Days Until</th>
                                    <th>Month</th>
                                    <th>Quarter</th>
                                    <th>Week Day</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->date->format('d/m/Y') }}</td>
                                        <td>{{ optional($event->typeEvent)->name ?? 'Not defined' }}</td>
                                        <td>{{ $event->days_until_event }}</td>
                                        <td>{{ $event->month }}</td>
                                        <td>{{ $event->quarter }}</td>
                                        <td>{{ $event->week_day }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('admin.events.edit', $event) }}" 
                                               class="btn btn-warning btn-sm">✏ Edit</a>

                                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Delete this event?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($events->isEmpty())
                            <p class="text-center mt-3">No events found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
