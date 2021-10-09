<?php

namespace Database\Factories;

use App\Models\StationeryType;
use Illuminate\Database\Eloquent\Factories\Factory;

class StationeryTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StationeryType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'color' => $this->faker->sentence(3),
            'size' => $this->faker->numberBetween($min = 100 , $max = 999),
            'material' => $this->faker->randomElement(['Papalería', 'Otros', 'Varios']),
        ];
    }
}
