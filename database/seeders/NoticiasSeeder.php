<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('noticias')->insert([
            [
                'categoria_id' => 1,
                'titulo' => 'Noticia loca',
                'descripcion' => 'Descripción loca',
                'imagen_url' => 'noticialoca.png',
                'cantidad_likes' => 0,
                'cantidad_vistos' => 0,
                'usuario_id' => 1,
                'activo' => 1,
                'fecha' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}