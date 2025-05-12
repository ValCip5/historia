<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert([
            [
                'id' => 1,
                'nombre' => 'Economía',
                'activo' => true,
            ],
            [
                'id' => 2,
                'nombre' => 'Gastronomía',
                'activo' => true,
            ],
            [
                'id' => 3,
                'nombre' => 'Política',
                'activo' => true,
            ],
            [
                'id' => 4,
                'nombre' => 'Deportes',
                'activo' => true,
            ],
            [
                'id' => 5,
                'nombre' => 'Ciencia',
                'activo' => true,
            ],
            [
                'id' => 6,
                'nombre' => 'Tecnología',
                'activo' => true,
            ],
            [
                'id' => 7,
                'nombre' => 'Cultura',
                'activo' => true,
            ],
            [
                'id' => 8,
                'nombre' => 'Automovilismo',
                'activo' => true,
            ],
        ]);
    }
}