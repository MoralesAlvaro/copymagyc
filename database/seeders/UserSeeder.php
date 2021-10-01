<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::insert([
            'name' => 'Alvaro',
            'surname' => 'Flores',
            'email' => 'moralesalvaro308@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'avatar' => null,
            'is_admin' => true,
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //User::factory()->count(2)->create();
    }
}
