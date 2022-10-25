@extends('layouts.main')

@section('title', 'Create Event')

@section('content')

    <div id="event-create-container" class="container">
        <h1>Create an event!</h1>

        @if(session('msg'))
            <div class="alert alert-success" role="alert">
                {{session('msg') }}
            </div>
        @endif


        <form action="/events" method="POST" class="row g-3 mt-4" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="title" class="form-label">Event name</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>


            <div class="col-md-6">
                <label for="state" class="form-label">State</label>
                <select id="state" class="form-select" name="state" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="PR">Paraná</option>
                    <option value="SP">São Paulo</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="MG">Minas Gerais</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <div class="col-md-6">
                <label for="private" class="form-label">This event is private</label>
                <select id="private" class="form-select" name="private" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>

                </select>
            </div>

            <div class="col-md-6">
                <label for="date" class="form-label">Date of the event</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3 col-md-12">
                <label for="image" class="form-label">Select the image: </label>
                <input class="form-control" name="image" type="file" id="formFile" required>
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Description of the event</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
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
                <button type="submit" class="btn btn-primary" value="create event">Create event</button>
            </div>

        </form>

    </div>

@endsection
