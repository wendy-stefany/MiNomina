<?php

namespace Database\Seeders;

use \App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'id' => '4020',
            'departamento' => 'Recursos Humanos',
            'encargado'=> 'JOse',
            'telefono' => '3316942356',
            
        ]);
        Departamento::create([
            
            'id' => '4021',
            'departamento' => 'ventas',
            'encargado' => 'manuael',
            'telefono' => '3316452356',
            
        ]);
        Departamento::create([
           
            'id' => '4022',
            'departamento' => 'ventasforanea',
            'encargado' => 'manuael valdez',
            'telefono' => '3316452586',
        ]);
    }
}
