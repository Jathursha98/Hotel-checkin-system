<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $room_ID=null;
        $roomID=Room::where('status','Booked')->pluck('id');

        if($roomID->count()>0){
            $room_ID=$this->faker->unique()->randomElement($roomID);
        }
        return array(
            'guestID'=>$this->faker->unique()->randomElement(Guest::pluck('id')),
            'roomID'=>$room_ID,
            'checkIn_Date'=>$this->faker->unique()->dateTimeBetween($startDate = '-3 days', $endDate = 'now')->format('Y-m-d'),
            'checkOut_Date'=>$this->faker->unique()->dateTimeBetween($startDate = '+1 days', $endDate = '+3 days')->format('Y-m-d'),
            'stayType'=>$this->faker->randomElement(['FB','BB']),
            'cost'=>$this->faker->randomElement(['15000','25000','40000']),

        );
    }
}
