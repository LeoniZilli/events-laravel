@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div id="event-show-container" class="container">

        <h1>{{$event->title}}</h1>

        <hr class="col-8 col-md-12 mb-3">

        @if(session('msg'))
            <div class="container">
                <div class="alert alert-success" role="alert">
                    {{session('msg') }}
                </div>
            </div>
        @endif

        <div class="row g-5">
            <div class="col-md-6 show-container-image d-flex justify-content-center">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}"
                     style="min-width: 80%; height: 100%; border-radius: 5px;" class="shadow">
            </div>

            <div class="col-md-6">
                <h2>Information</h2>
                <ul class="list-group show-list-event">
                    <li class="my-2">
                        <ion-icon name="location-outline"></ion-icon>
                        {{$event->city . " - " . $event->state}}
                    </li>
                    <li class="my-2">
                        <ion-icon name="people-outline"></ion-icon>
                        {{count($event->users)}} Participants
                    </li>
                    <li class="my-2">
                        <ion-icon name="star-outline"></ion-icon>
                        Organizer: {{$eventOwner['name']}}
                    </li>
                </ul>

                @if(!$hasUserJoined)
                    <form action="/events/join/{{$event->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn-confirm mt-3" id="event-submit">
                            Confirm presence
                        </button>
                    </form>
                @else
                        <button class="btn-confirmed mt-3" id="event-submit">
                            Presence already confirmed
                        </button>
                @endif

            </div>
        </div>


        <hr class="col-8 col-md-12 mb-3">


        <div class="d-flex m-auto" style="max-width: 80%;">

            <div class="mb-auto w-100 d-flex justify-content-center flex-column">
                <h3 class="text-center m-4 col-md-12">At the event will have:</h3>
                <ul class="list-group show-list-event-items m-4">
                    @foreach($event->items as $item)
                        <li class="my-2">
                            <ion-icon name="checkmark-sharp" class="checkmark-sharp"></ion-icon>
                            <span>
                        {{$item}}
                    </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-auto w-100 d-flex justify-content-center flex-column hr-div">
                <h3 class="text-center m-4 col-md-12">Description Event</h3>
                <p class="col-md-12 m-4">{{$event->description}}</p>
            </div>
        </div>
    </div>

@endsection
