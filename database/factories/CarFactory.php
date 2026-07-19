<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => 'CAR-' . fake()->unique()->numberBetween(1000, 9999),

            'plate_number' => strtoupper(
                fake()->randomElement(['B', 'D', 'F', 'T']) . ' ' .
                fake()->numberBetween(1000, 9999) . ' ' .
                fake()->lexify('???')
            ),

            'driver_name' => fake()->name(),

            'phone' => fake()->phoneNumber(),

            'status' => fake()->randomElement([
                'Standby',
                'Delivery',
                'Completed',
            ]),
        ];
    }
}