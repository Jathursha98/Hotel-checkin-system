<?php

namespace App\Http\Controllers;


use App\Models\Booking;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Booking::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {

        $roomID = Room::where('status','Available')->pluck('id')->first();

        $guestID =Guest::insertGetId(['name' =>'Charlie Wang','address'=>'2345A Halifax Avenue NY 267',
                'contactNo'=>'223 252 3200','nicNo' => '945238747v']);
        $bookings=DB::table('bookings')->insert([
            'guestID'=>$guestID,
            'roomID'=>$roomID,
            'checkIn_Date'=>'2023-03-29',
            'checkOut_Date'=>'2023-04-01',
            'stayType'=>'FB',
            'cost'=>'40000'
        ]);
       // $bookings->save();
        return response()->json($bookings);

    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
