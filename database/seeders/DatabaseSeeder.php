<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Reseteando tablas
        $this->truncateTables([
            'users',
            'suppliers',
            'customers',
            'stationery_types',
            'raw_materials',
        ]);

        // Sembrando
        $this->call(UserSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(StationeryTypeSeeder::class);
        $this->call(RawMaterialSeeder::class);
        

    }

    // Método para resetear tablas
    public function truncateTables(array $tables)
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
