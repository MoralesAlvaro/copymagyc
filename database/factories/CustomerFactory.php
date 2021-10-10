<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

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
            'nit' => $this->faker->numberBetween($min = 10000000000000000, $max = 99999999999999999),
            'company_type' => $this->faker->randomElement(['Pequeña', 'Mediana', 'Grande']),
            'business' => $this->faker->sentence(),
            'active' => $this->faker->randomElement(['0', '1']),
            'user_id' => '1',
        ];
    }
}
