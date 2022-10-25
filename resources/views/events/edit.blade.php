@extends('layouts.main')

@section('title', 'Editing: ' . $event->title)

@section('content')

<div id="event-create-container" class="container">
    <h1>Editing: {{$event->title}}</h1>


    <form action="/events/update/{{$event->id}}" method="POST" class="row g-3 mt-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="title" class="form-label">Event name</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
        </div>

        <div class="col-md-12 d-flex justify-content-center" style="border:1px solid black;">
            <img src="/img/events/{{$event->image}}" alt="{{$event->image}}">
        </div>

        <div class="mb-3 col-md-12">
            <label for="image" class="form-label">Select the image: </label>
            <input class="form-control" name="image" type="file" id="formFile">
        </div> 

        <div class="col-md-6">
            <label for="state" class="form-label">State</label>
            <select id="state" class="form-select" name="state">
                <option selected disabled value="">Choose...</option>
                <option value="PR" {{$event->state === "PR" ? "selected='selected'" : ""}} >Paraná</option>
                <option value="SP" {{$event->state === "SP" ? "selected='selected'" : ""}} >São Paulo</option>
                <option value="SC" {{$event->state === "SC" ? "selected='selected'" : ""}} >Santa Catarina</option>
                <option value="RJ" {{$event->state === "RJ" ? "selected='selected'" : ""}} >Rio de Janeiro</option>
                <option value="MG" {{$event->state === "MG" ? "selected='selected'" : ""}} >Minas Gerais</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{$event->city}}">
        </div>

        <div class="col-md-6">
            <label for="private" class="form-label">This event is private</label>
            <select id="private" class="form-select" name="private">
                <option selected disabled value="">Choose...</option>
                <option value="1" {{$event->private == 1 ? "selected='selected'" : ""}}>Yes</option>
                <option value="0" {{$event->private == 0 ? "selected='selected'" : ""}}>No</option>

            </select>
        </div>

        <div class="col-md-6">
            <label for="date" class="form-label">Date of the event</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d') }}">
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">Description of the event</label>
            <textarea class="form-control" id="description" name="description" rows="3" value="">{{$event->description}}</textarea>
        </div>

        <div class="col-md-12">
            <label>Add infrastructure items:</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="" name="items[]" value="Chairs">
                <label class="form-check-label">Chairs</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="" name="items[]" value="Tables">
                <label class="form-check-label">Tables</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="" name="items[]" value="Stage">
                <label class="form-check-label">Stage</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="" name="items[]" value="Illumination">
                <label class="form-check-label">Illumination</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="" name="items[]" value="Sound equipment">
                <label class="form-check-label">Sound equipment</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="" name="items[]" value="Decoration">
                <label class="form-check-label">Decoration</label>
            </div>
        </div>
        <div class="col-12 mb-4">
            <button type="submit" class="btn btn-success" value="create event">Save edit</button>
        </div>

    </form>

</div>

@endsection