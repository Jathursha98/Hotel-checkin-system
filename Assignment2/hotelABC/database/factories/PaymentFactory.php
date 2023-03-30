<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\CheckIn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subTotal= $this ->faker->numberBetween(45000,200000);
        $tax = $subTotal*0.1;
        $total = $subTotal+$tax;

        return [
            'booking_id'=>$this->faker->unique()->randomElement(Booking::pluck('id')),
            'subTotal'=>$subTotal,
            'tax'=>$tax,
            'Total'=>$total,
        ];
    }
}
