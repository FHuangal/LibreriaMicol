<?php

namespace Database\Seeders;

use App\Models\Comprobante;
use App\Models\User;
use App\Models\Category;
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
        //
        Comprobante::create([
            'tipo' => 'BOLETA',
            'serie' => 'B001',
            'codigo' => '03'
        ]);

        Comprobante::create([
            'tipo' => 'FACTURA',
            'serie' => 'F001',
            'codigo' => '01',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'rol' => 'administrador',
        ]);

        Category::create([
            'nombre' => 'Categoria A',
        ]);
        Category::create([
            'nombre' => 'Categoria B',
        ]);
        Category::create([
            'nombre' => 'Categoria C',
        ]);
        Category::create([
            'nombre' => 'Categoria D',
        ]);
        Category::create([
            'nombre' => 'Categoria E',
        ]);
    }
}
