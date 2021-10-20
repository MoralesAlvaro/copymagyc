<?php

namespace Database\Factories;

use App\Models\RawMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RawMaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RawMaterial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(10),
            'name' => $this->faker->name,
            'buy_date' => $this->faker->date(),
            'amount' => $this->faker->numberBetween($min = 100 , $max = 999),
            'comment' => $this->faker->randomElement(['Pequeña', 'Mediana', 'Grande']),
            'user_id' => '1',
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'supplier_id' => $this->faker->randomElement(['2', '1']),
            'stationery_type_id' => $this->faker->randomElement(['2', '1']),
        ];
    }
}
