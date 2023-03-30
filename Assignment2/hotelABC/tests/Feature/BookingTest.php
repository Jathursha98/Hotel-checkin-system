<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * A basic test example.
     */

    public function test_if_all_bookings_can_be_viewed():void
    {
        $response =$this->get('api/bookings');

        $bookings = $response->json();

        dd($bookings);

        $response->assertStatus(200);
    }
    public function test_if_a_booking_is_created():void
    {
        $response =$this->post('api/bookings');

        $bookings = $response->json();

        dd($bookings);

        $response->assertStatus(200);
    }
}

