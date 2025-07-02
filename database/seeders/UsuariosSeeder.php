<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('usuarios')->insert([
            [
                'email' => 'admin@admin',
                'password' => Hash::make("admin"),
                'username' => 'admin',
                'nombre' => 'admi',
                'es_admin' => '1',
                'es_miembro' => '0',
                'apellido' => 'nistrador',
                'foto_url' => 'perfil.png',
                'subscribed_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'normal@normal',
                'password' => Hash::make("normal"),
                'username' => 'normal',
                'nombre' => 'nor',
                'es_admin' => '0',
                'es_miembro' => '0',
                'apellido' => 'mal',
                'foto_url' => 'perfil.png',
                'subscribed_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'membresia@membresia',
                'password' => Hash::make("membresia"),
                'username' => 'membresia',
                'nombre' => 'mem',
                'es_admin' => '0',
                'es_miembro' => '1',
                'apellido' => 'bresia',
                'foto_url' => 'perfil.png',
                'subscribed_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}