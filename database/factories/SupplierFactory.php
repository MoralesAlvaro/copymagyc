<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'nrc' => $this->faker->numberBetween($min = 1000000, $max = 9999999),
            'nit' => Str::random(10),
            'company_type' => $this->faker->randomElement(['Pequeña', 'Mediana', 'Grande']),
            'business' => $this->faker->sentence(),
            'telephone' => $this->faker->numerify(),
            'email' => $this->faker->unique()->safeEmail(),
            'active' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
