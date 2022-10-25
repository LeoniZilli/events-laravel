@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')


<div id="event-show-container" class="container">
    <h1>My Events</h1>
    <hr class="col-8 col-md-12 mb-3">
</div>

@if(count($events) > 0)
@else
    <p class="w-100 text-center mt-4 lead">You don't have any events yet</p>
@endif

@endsection