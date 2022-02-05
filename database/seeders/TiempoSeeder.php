<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tiempo;

class TiempoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tiempo::create([
            'tiempo_inicio' => '0.00',
            'tiempo_final' => '0.00'
        ]);

        Tiempo::create([
            'tiempo_inicio' => '0.00',
            'tiempo_final' => '0.00'
        ]);
    }
}
