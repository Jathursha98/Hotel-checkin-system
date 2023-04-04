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
            Booking::orderby('stay_type','ASC')->get()
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

        $guestID =Guest::insertGetId(['name' =>'Charlie Wang', 'contact_no'=>'223 252 3200','nic_no' => '945238747v']);
        $bookings=Booking::insert([
            'guest_id'=>$guestID,
            'room_id'=>$roomID,
            'checkin_date'=>'2023-03-29',
            'checkout_date'=>'2023-04-01',
            'stay_type'=>'FB',
        ]);
        $room_status=Room::where('id',$roomID)->get();
        $room_status->toQuery()->update([
            'status' => 'Booked',
        ]);
        return response()->json($bookings);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //Left Join with tables room and booking to retrieve all room details
        $room = DB::table('rooms')
            ->leftJoin('bookings','rooms.id','=', 'bookings.room_id')
            ->leftJoin('guests', 'guests.id', '=', 'bookings.guest_id')
            ->select('rooms.*', 'bookings.checkin_date', 'bookings.checkout_date', 'bookings.stay_type',
                'guests.name', 'guests.contact_no', 'guests.nic_no')
            ->orderBy('rooms.status', 'DESC')
            ->get();

        return response()->json($room);

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
