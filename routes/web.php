<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'flights'],function(){
    Route::get('/',[FLightController::class,'getAllFLights'])->name('getAllFLights');
    Route::post('/saveFlight',[FlightController::class,'saveFlight'])->name('saveFlight');
    Route::get('/editFlight/{id}',[FlightController::class,'editFlight'])->name('editFlight');
    Route::put('/updateFlight/{id}',[FlightController::class,'updateFlight'])->name('updateFlight');
    Route::delete('/deleteFlight/{id}',[FlightController::class,'deleteFlight'])->name('deleteFlight');
});