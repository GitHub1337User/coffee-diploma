<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Капучино',
            'description' => 'Кофе Капучино можно заказать в нашей кофейне с доставкой',
            'price'=>100,
            'image'=>'cappucino.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Американо',
            'description' => 'Кофе Американо можно заказать в нашей кофейне с доставкой',
            'price'=>70,
            'image'=>'americano.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Флэт-Уайт',
            'description' => 'Кофе Флэт-Уайт можно заказать в нашей кофейне с доставкой',
            'price'=>120,
            'image'=>'flat.jpg'
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Макиато',
            'description' => 'Кофе Макиато можно заказать в нашей кофейне с доставкой',
            'price'=>100,
            'image'=>'machiato.jpg'
        ]); DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Латте',
            'description' => 'Кофе Латте можно заказать в нашей кофейне с доставкой',
            'price'=>150,
            'image'=>'latte.jpg'
        ]);DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Вьетнамский кофе',
            'description' => 'Вьетнамский кофе можно заказать в нашей кофейне с доставкой',
            'price'=>200,
            'image'=>'vietnam.jpg'
        ]);DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Кафе бомбон',
            'description' => 'Кофе бомбон можно заказать в нашей кофейне с доставкой',
            'price'=>210,
            'image'=>'bombon.jpg'
        ]);DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Кофе по-венски',
            'description' => 'Кофе по-венски можно заказать в нашей кофейне с доставкой',
            'price'=>190,
            'image'=>'venskoe.jpg'
        ]);DB::table('products')->insert([
            'category_id' => 1,
            'title' => 'Меланж',
            'description' => 'Кофе Меланж можно заказать в нашей кофейне с доставкой',
            'price'=>250,
            'image'=>'melanj.jpg'
        ]);
    }
}
