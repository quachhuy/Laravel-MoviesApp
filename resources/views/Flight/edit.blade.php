@extends('layouts.app')


@section('title','Edit Flight')

@section('content')


<!-- editModal.blade.php -->
<div class="container">

    <form method="POST" action="{{ route('updateFlight', ['id' => $flight->Flight_ID]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="aircraft_id">Aircraft ID</label>
            <input type="text" class="form-control" id="aircraft_id" name="aircraft_id"
                value="{{ $flight->Aircraft_ID }}" required>
        </div>
        <div class="form-group">
            <label for="departure_airport">Departure Airport</label>
            <input type="text" class="form-control" id="departure_airport" name="departure_airport"
                value="{{ $flight->Departure_Airport }}" required>
        </div>
        <div class="form-group">
            <label for="arrival_airport">Arrival Airport</label>
            <input type="text" class="form-control" id="arrival_airport" name="arrival_airport"
                value="{{ $flight->Arrival_Airport }}" required>
        </div>
        <div class="form-group">
            <label for="departure_time">Departure Time</label>
            <input type="date" class="form-control" id="departure_time" name="departure_time"
                value="{{ $flight->Departure_Time }}" required>
        </div>
        <div class="form-group">
            <label for="arrival_time">Arrival Time</label>
            <input type="date" class="form-control" id="arrival_time" name="arrival_time"
                value="{{ $flight->Arrival_Time}}" required>
        </div>
        <div class="form-group">
            <label for="flight_duration">Flight Duration</label>
            <input type="time" class="form-control" id="flight_duration" name="flight_duration"
                value="{{ $flight->Flight_Duration }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<style>
htnl,


.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
</style>

@endsection