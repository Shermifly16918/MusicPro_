<?php

namespace Database\Seeders;
use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre_categoria' => 'accesorios'
        ]);
        Categoria::create([
            'nombre_categoria' => 'cuerdas'
        ]);
        Categoria::create([
            'nombre_categoria' => 'sets de batería'
        ]);
        Categoria::create([
            'nombre_categoria' => 'pedales'
        ]);
        Categoria::create([
            'nombre_categoria' => 'adaptadores'
        ]);
        Categoria::create([
            'nombre_categoria' => 'interfaces'
        ]);
        Categoria::create([
            'nombre_categoria' => 'parlantes'
        ]);
        Categoria::create([
            'nombre_categoria' => 'bajos'
        ]);
        Categoria::create([
            'nombre_categoria' => 'guitarras'
        ]);
        Categoria::create([
            'nombre_categoria' => 'amplificadores'
        ]);
    }
}
