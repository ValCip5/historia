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
            ],
        ]);
    }
}