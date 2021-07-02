<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Empleado::factory(10)->create();
    }
}
