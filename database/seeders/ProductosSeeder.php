<?php

namespace Database\Seeders;
use DB;
use DateTime;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $hora = new DateTime();
        $hora = $hora->format('Y-m-d H:i:s');
        DB::table('productos')->insert([
            'nombre' => 'Producto 1',
            'precio' => '123.45',
            'impuesto' => '5',
            'estado' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
            ]);

        DB::table('productos')->insert([
            'nombre' => 'Producto 2',
            'precio' => '46.65',
            'impuesto' => '15',
            'estado' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Producto 3',
            'precio' => '39.76',
            'impuesto' => '12',
            'estado' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
            ]);

        DB::table('productos')->insert([
            'nombre' => 'Producto 4',
            'precio' => '250.00',
            'impuesto' => '8',
            'estado' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Producto 5',
            'precio' => '59.35',
            'impuesto' => '10',
            'estado' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
            ]);
    }
}
