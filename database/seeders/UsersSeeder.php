<?php

namespace Database\Seeders;
use DB;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
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
        DB::table('users')->insert([
            'nombre' => 'User 1',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'estado' => 'ACTIVO',
            'tipo_usuario' => 'ADMINISTRADOR',
            'created_at' => $hora,
            'updated_at' => $hora,
            ]);

        DB::table('users')->insert([
            'nombre' => 'Cliente1',
            'email' => 'Cliente@mail.com',
            'password' => Hash::make('12345678'),
            'estado' => 'ACTIVO',
            'tipo_usuario' => 'CLIENTE',
            'created_at' => $hora,
            'updated_at' => $hora,
             ]);

        DB::table('users')->insert([
                'nombre' => 'Cliente2',
                'email' => 'Cliente2@mail.com',
                'password' => Hash::make('12345678'),
                'estado' => 'ACTIVO',
                'tipo_usuario' => 'CLIENTE',
                'created_at' => $hora,
                'updated_at' => $hora,
                ]);

        DB::table('users')->insert([
                'nombre' => 'Cliente3',
                'email' => 'Cliente3@mail.com',
                'password' => Hash::make('12345678'),
                'estado' => 'ACTIVO',
                'tipo_usuario' => 'CLIENTE',
                'created_at' => $hora,
                'updated_at' => $hora,
                 ]);
        DB::table('users')->insert([
                    'nombre' => 'Cliente4',
                    'email' => 'Cliente4@mail.com',
                    'password' => Hash::make('12345678'),
                    'estado' => 'ACTIVO',
                    'tipo_usuario' => 'CLIENTE',
                    'created_at' => $hora,
                    'updated_at' => $hora,
                    ]);

        DB::table('users')->insert([
                    'nombre' => 'Cliente5',
                    'email' => 'Cliente5@mail.com',
                    'password' => Hash::make('12345678'),
                    'estado' => 'ACTIVO',
                    'tipo_usuario' => 'CLIENTE',
                    'created_at' => $hora,
                    'updated_at' => $hora,
                     ]);


    }
}
