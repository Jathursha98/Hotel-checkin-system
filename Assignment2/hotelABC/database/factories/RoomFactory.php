<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //SuiteType assigned to integer such that Standard =0, and Deluxe =1;
            'suite_type'=>$this->faker->randomElement([0,1]),
            'room_no'=>$this->faker->unique()->numberBetween(101,130),
            'status'=>$this->faker->randomElement(['Available','Booked']),
        ];
    }
}
