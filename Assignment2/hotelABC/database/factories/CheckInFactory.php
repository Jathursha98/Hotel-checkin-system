<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckIn>
 */
class CheckInFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bookingID'=>$this->faker->unique()->randomElement(Booking::pluck('id')),
            'checkIn_Date_Time'=>$this->faker->unique()->dateTimeBetween($startDate = '-3 days', $endDate = 'now')->format('Y-m-d'),
            'checkOut_Date_Time'=>$this->faker->unique()->dateTimeBetween($startDate = '+1 days', $endDate = '+3 days')->format('Y-m-d'),
            'totalDays'=>$this->faker->unique()->numberBetween(3,7)
        ];
    }
}
