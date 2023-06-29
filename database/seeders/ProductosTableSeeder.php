<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Producto::create([
            'name' => 'Púas de guitarra',
            'slug' => '',
            'details' => 'Set de 12 púas para guitarra',
            'price' => 1000,
            'stock' => 10,
            'shipping_cost' => 10000,
            'categoria_id' => 1,
            'image_path' => ''
        ]);

        Producto::create([
            'name' => 'Cuerdas DAddario',
            'slug' => 'modelo DAddario',
            'details' => 'Cuerdas para guitarra eléctrica calibre 0.10',
            'price' => 10000,
            'stock' => 30,
            'shipping_cost' => 5000,
            'categoria_id' => 2,
            'image_path' => 'images/cuerdas.png'
        ]);

        Producto::create([
            'name' => 'Set de batería Pearl',
            'slug' => 'Pearl',
            'details' => 'Set de batería completo Pearl con platillos y banqueta',
            'price' => 1200000,
            'stock' => 3,
            'shipping_cost' => 10000,
            'categoria_id' => 3,
            'image_path' => 'images/set_bateria.png'
        ]);

        Producto::create([
            'name' => 'Pedal de efectos Boss DS-1',
            'slug' => 'modelo Boss DS-1',
            'details' => 'Pedal de distorsión para guitarra eléctrica',
            'price' => 90000,
            'stock' => 20,
            'shipping_cost' => 10000,
            'categoria_id' => 4,
            'image_path' => 'images/pedal.png'
        ]);

        Producto::create([
            'name' => 'Adaptador de audio',
            'slug' => '',
            'details' => 'Adaptador 1/4 a 1/8 para conectar instrumentos a la computadora',
            'price' => 5000,
            'stock' => 15,
            'shipping_cost' => 5000,
            'categoria_id' => 5,
            'image_path' => ''
        ]);

        Producto::create([
            'name' => 'Interfaz de audio Focusrite Scarlett',
            'slug' => 'Focusrite Scarlett',
            'details' => 'Interfaz de audio para grabación de guitarra eléctrica y otros instrumentos',
            'price' => 350000,
            'stock' => 8,
            'shipping_cost' => 5000,
            'categoria_id' => 6,
            'image_path' => ''
        ]);

        Producto::create([
            'name' => 'Altavoz para guitarra',
            'slug' => 'modelo Celestion V30',
            'details' => 'Altavoz de guitarra eléctrica de 12',
            'price' => 200000,
            'stock' => 12,
            'shipping_cost' => 5000,
            'categoria_id' => 7,
            'image_path' => ''
        ]);

        Producto::create([
            'name' => 'Bajo activo Ibanez',
            'slug' => 'modelo Ibanez SR305E',
            'details' => 'Bajo activo de 4 cuerdas, cuerpo de caoba',
            'price' => 700000,
            'stock' => 6,
            'shipping_cost' => 5000,
            'categoria_id' => 8,
            'image_path' => ''
        ]);

        Producto::create([
            'name' => 'Guitarra acústica Fender',
            'slug' => 'Modelo Fender',
            'details' => 'cuerpo de caoba y diapasón de palisandro',
            'price' => 500000,
            'stock' => 10,
            'shipping_cost' => 10000,
            'categoria_id' => 9,
            'image_path' => 'images/guitarra_fender.png'
        ]);

        Producto::create([
            'name' => 'Amplificador de guitarra',
            'slug' => '',
            'details' => 'Amplificador de guitarra de 100 watts',
            'price' => 300000,
            'stock' => 4,
            'shipping_cost' => 5000,
            'categoria_id' => 10,
            'image_path' => 'images/amplificador_marshall.png'
        ]);

    }
}
