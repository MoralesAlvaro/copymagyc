<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StationeryType;

class StationeryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StationeryType::factory()->count(15)->create();
    }
}
