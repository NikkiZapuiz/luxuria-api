<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_number' => fake()->numerify('lux-#####'),
            'room_id' => Room:: factory(),
            'user_id' => User:: factory(),
            'checkin_date' => fake()->dateTimeThisMonth(),
            'checkout_date' => fake()->dateTimeThisMonth(),
            'adult_count' => fake()->numberBetween(1, 5),
            'child_count' => fake()->numberBetween(0, 5),
        ];
    }
}
