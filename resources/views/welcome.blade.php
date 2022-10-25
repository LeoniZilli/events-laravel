@extends('layouts.main')

@section('title', 'Laravel Project')

@section('content')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-dark rounded">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Punny headline</h1>
            <p class="lead fw-normal text-light">And an even wittier subheading to boot. Jumpstart your marketing
                efforts with this example based on Apple’s marketing pages.</p>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="/" method="POST">
                <input type="text" name="search" id="search" class="form-control form-control-sm form-control-dark"
                       placeholder="Search..." aria-label="Search" onkeyup="pesquisa()">
            </form>
        </div>
    </div>

    <h1 class="w-100 next-events mb-4">Next events</h1>

    @if(count($events) == 0)
        <p class="w-100 text-center mt-4 lead">There are no events available</p>
    @endif


    <article class="col-md-12">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-4 my-4">
                        <div class="card">
                            <div class="card-image">
                                <img class="img" src="/img/events/{{$event->image}}">
                                <div class="card-caption">
                                    <div class="widget-49-date-primary">
                                        <span class="widget-49-date-day">{{ date('d', strtotime($event->date))}}</span>
                                        <span
                                            class="widget-49-date-month">{{ strftime('%b', strtotime($event->date))}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="table text-center m-0">
                                <h2 class="display-5 event-sub pt-3">{{$event->title}}</h2>
                                <p class="card-description mx-3"> {{$event->description}} </p>
                            </div>
                            <div class="btn-know-more mb-3 d-flex justify-content-center">
                                <a href="/events/{{$event->id}}">
                                    <button class="btn-know">
                                        Know More
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </article>


@endsection
