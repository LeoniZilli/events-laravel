@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="container">
        <div id="event-show-container" class="container mt-3">
            <h1>My Events</h1>
            <hr class="col-8 col-md-12 mb-3">
        </div>

        @if(session('msg'))
            <div class="container">
                <div class="alert alert-success" role="alert">
                    {{session('msg') }}
                </div>
            </div>
        @endif

        @if(count($events) > 0)

            <div class="container">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Event name</th>
                        <th scope="col">Participants</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1}}</td>
                            <td>
                                {{ $event->title}}
                            </td>
                            <td>{{count($event->users)}}</td>
                            <td class="d-flex">
                                <a href="/events/{{ $event->id }}" class="text-decoration-none mx-1">
                                    <button class="btn btn-info text-white btn-sm">
                                        <i class="bi bi-eye me-1"></i>
                                        View
                                    </button>
                                </a>
                                <a href="/events/edit/{{$event->id}}" class="text-decoration-none mx-1">
                                    <button class="btn btn-primary btn-sm shadow-lg">
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit
                                    </button>
                                </a>
                                <form action="/events/{{ $event->id }}" method="POST" class="mx-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash me-1"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <p class="w-100 text-center mt-4 lead">You don't have any events yet</p>
            <p class="w-100 text-center mt-4 lead">
                <a href="/event/create">
                    <button class="btn btn-primary btn-lg">
                        Create events
                    </button>
                </a>
            </p>
        @endif
    </div>

    <div class="container">
        <div id="event-show-container" class="container mt-5">
            <h1>Events i participate</h1>
            <hr class="col-8 col-md-12 mb-3">
        </div>

        @if(count($eventsasparticipant) > 0)

            <div class="container">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Event name</th>
                        <th scope="col">Participants</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventsasparticipant as $event)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1}}</td>
                            <td>{{ $event->title}}</td>
                            <td>{{count($event->users)}}</td>
                            <td>
                                <form action="/events/leave/{{ $event->id }}" method="POST" class="mx-1">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <i class="bi bi-door-open me-1"></i>
                                        Leave the event
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <p class="w-100 text-center mt-4 lead">You don't have any events yet</p>
            <p class="w-100 text-center mt-4 lead">
                <a href="/">
                    <button class="btn btn-primary btn-lg">
                        Participate in an event
                    </button>
                </a>
            </p>
        @endif


    </div>

@endsection
