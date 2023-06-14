<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function getAllFLights(){
        $flight = Flight::orderBy('Flight_ID','DESC')->paginate(10);
        return view('Flight.index',compact('flight'));
    }
    public function saveFlight(Request $request){
        $flight = new FLight();
        $flight->Aircraft_ID = $request->input('Aircraft_ID');
        $flight->Departure_Airport = $request->input('Departure_Airport');
        $flight->Arrival_Airport = $request->input('Arrival_Airport');
        $flight->Departure_Time = $request->input('Departure_Time');
        $flight->Arrival_Time = $request->input('Arrival_Time');
        $flight->Flight_Duration = $request->input('Flight_Duration');

        $flight->save();
        return redirect()->back()->with('success','Flight Added Successfully');
    }
    public function editFlight($id){
        $flight = Flight::find($id);
        return view('Flight.editModal',compact('flight'));
    }
    public function updateFlight(Request $request,$id){   
        $flight = Flight::find($id);
        $flight->Aircraft_ID = $request->input('Aircraft_ID');
        $flight->Departure_Airport = $request->input('departure_airport');
        $flight->Arrival_Airport = $request->input('arrival_airport');
        $flight->Departure_Time = $request->input('departure_time');
        $flight->Arrival_Time = $request->input('arrival_time');
        $flight->Flight_Duration = $request->input('flight_duration');
        $flight->save();
        return redirect()->back()->with('success','Flight Updated Successfully');
    }
    public function deleteFlight($id){
        $flight = Flight::find($id);
        $flight->delete();
        return redirect()->back()->with('success','Flight Deleted Successfully');
    }
}
