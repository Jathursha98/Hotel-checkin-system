<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic test example.
     */

    public function test_if_all_rooms_can_be_viewed():void
    {
        $response =$this->get('api/room');

        $rooms = $response->json();

        dd($rooms);

        $response->assertStatus(200);
    }

    public function test_if_all_rooms_can_be_viewed_by_sorted():void
    {
        $response =$this->get('api/room');
        //$rooms = $response->json();
        $collection = collect($response->json());
        $filtered =$collection->filter(function ($room) {
            return $room->orderBy('status')->where('status', '=', 'Booked');
                });
        dd($filtered);
        $response->assertStatus(200);
    }

}
