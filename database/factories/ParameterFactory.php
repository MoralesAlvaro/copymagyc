<?php

namespace Database\Factories;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParameterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parameter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Copy Magic',
            'logo_1' => url('img/logo/logo.jpeg'),
            'logo_2' => url('img/logo/logo_letras.png'),
            'representative' => 'Francisco Alexander Castro Cardoza', 
            'telephone' => '71689787',
            'email' => 'copymagic_ues@hotmail.com',
            'address' => 'Auotpista Norte Local N° 2, San Salvador',
            'company_nit' => '',
            'nrc' => '',
            'representative_nit' => '',
            'company_type' => 'Pequeña'
        ];
    }
}
