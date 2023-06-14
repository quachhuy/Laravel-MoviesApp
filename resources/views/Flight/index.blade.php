@extends('layouts.app')


@section('title','Flight Management System')

@section('content')

<!-- start: Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Flight</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('saveFlight') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group md-6">
                        <label for="Aircraft_ID">Aircraft ID</label>
                        <input type="text" name="Aircraft_ID" class="form-control" id="Aircraft_ID" required>
                    </div>
                    <div class="form-group md-6">
                        <label for="Departure_Airport">Departure Airport</label>
                        <input type="text" name="Departure_Airport" class="form-control" id="Departure_Airport"
                            required>
                    </div>
                    <div class="form-group md-6">
                        <label for="Arrival_Airport">Arrival Airport</label>
                        <input type="text" name="Arrival_Airport" class="form-control" id="Arrival_Airport" required>
                    </div>
                    <div class="form-group md-6">
                        <label for="Departure_Time">Departure Time</label>
                        <input type="date" name="Departure_Time" class="form-control" id="Departure_Time" required>
                    </div>
                    <div class="form-group md-6">
                        <label for="Arrival_Time">Arrival Time</label>
                        <input type="date" name="Arrival_Time" class="form-control" id="Arrival_Time" required>
                    </div>
                    <div class="form-group md-6">
                        <label for="Flight_Duration">Flight Duration</label>
                        <input type="time" name="Flight_Duration" class="form-control" id="Flight_Duration" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end: Add Modal -->


<div class="container py-3">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Flight Management System
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">New Flight</button>
                </h4>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>

                            <td scope="col">Flight ID</td>
                            <td scope="col">Aircraft ID</td>
                            <td scope="col">Departure Airport</td>
                            <td scope="col">Arrival Airport</td>
                            <td scope="col">Departure Time</td>
                            <td scope="col">Arrival Time</td>
                            <td scope="col">Flight Duration</td>
                            <td scope="col">Action</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flight as $flight)
                        <tr>
                            <td scope="row">{{$flight->Flight_ID}}</td>
                            <td>{{$flight->Aircraft_ID}}</td>
                            <td>{{$flight->Departure_Airport}}</td>
                            <td>{{$flight->Arrival_Airport}}</td>
                            <td>{{$flight->Departure_Time}}</td>
                            <td>{{$flight->Arrival_Time}}</td>
                            <td>{{$flight->Flight_Duration}}</td>
                            <td>
                                <a href="{{ route('editFlight',$flight->Flight_ID) }}" class="btn btn-info">Edit</a>

                                <a class="btn btn-danger " href="{{ route('deleteFlight',$flight->Flight_ID) }}" onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to delete this flight?')) {
                                        document.getElementById('delete-form').submit();}">
                                Delete
                                </a>
                                <form id="delete-form" action="{{ route('deleteFlight', $flight->Flight_ID) }}" method="POST"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>

@endsection