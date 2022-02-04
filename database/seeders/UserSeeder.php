<?php

namespace Database\Seeders;

use App\Models\Comprobante;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\User;
use App\Models\Category;
use App\Models\Cliente;
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
        Proveedor::create([
            'nombre' => 'TAY LOY S.A',
            'email' => 'tayloy@gmail.com',
            'ruc' => '20100049181',
            'direccion' => 'Chiclayo',
            'telefono' => '956749576', 
        ]);

        Producto::create([
            'nombre'=>'Producto 1',
            'stock'=>'999',
            'precio_venta'=>'1.5',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 2',
            'stock'=>'840',
            'precio_venta'=>'2',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 3',
            'stock'=>'999',
            'precio_venta'=>'1',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 4',
            'stock'=>'999',
            'precio_venta'=>'3.5',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 5',
            'stock'=>'999',
            'precio_venta'=>'2.4',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 6',
            'stock'=>'999',
            'precio_venta'=>'1.2',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 7',
            'stock'=>'999',
            'precio_venta'=>'0.5',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 8',
            'stock'=>'999',
            'precio_venta'=>'1.5',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 9',
            'stock'=>'999',
            'precio_venta'=>'3.2',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 10',
            'stock'=>'999',
            'precio_venta'=>'1.8',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Producto::create([
            'nombre'=>'Producto 11',
            'stock'=>'999',
            'precio_venta'=>'5',
            'lugar'=>'S1',
            'estado'=>'ACTIVADO',
            'category_id'=>'1',
            'proveedor_id'=>'1',
        ]);
        Cliente::create([
            'nombre'=>'Cliente 1',
            'documento'=>'75236458',
            'direccion'=>'calle bolivar',
            'telefono'=>'956325485',
            'email'=>'cliente@gmail.com',
         
        ]);
    }
}
