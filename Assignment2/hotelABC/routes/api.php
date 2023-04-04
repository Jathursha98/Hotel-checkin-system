<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/booking',[\App\Http\Controllers\BookingController::class, 'index']);

Route::post('/booking',[\App\Http\Controllers\BookingController::class, 'store']);

Route::get('/booking_with_rooms',[\App\Http\Controllers\BookingController::class, 'show']);

Route::get('/room',[\App\Http\Controllers\RoomController::class, 'index']);


Route::get('/bookings', function () {
    return \App\Http\Resources\BookingResource::collection(\App\Models\Booking::all());
});

Route::get('/rooms', function () {
    return \App\Http\Resources\RoomResource::collection(\App\Models\Room::all());
});

