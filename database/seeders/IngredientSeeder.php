<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'title' => 'Молоко',
            'description' => 'Молоко можно заказать в нашей кофейне с доставкой',
            'price'=>50,
            'image'=>'milk.jpg'
        ]); DB::table('ingredients')->insert([
            'title' => 'Арабика',
            'description' => 'Зерна арабики можно заказать в нашей кофейне с доставкой',
            'price'=>300,
            'image'=>'arabica.jpg'
        ]); DB::table('ingredients')->insert([
            'title' => 'Сливки',
            'description' => 'Сливки можно заказать в нашей кофейне с доставкой',
            'price'=>150,
            'image'=>'slivki.jpeg'
        ]);DB::table('ingredients')->insert([
            'title' => 'Сгущенка',
            'description' => 'Сгущенку можно заказать в нашей кофейне с доставкой',
            'price'=>80,
            'image'=>'sgu.jpg'
        ]);DB::table('ingredients')->insert([
            'title' => 'Зеленое кофе',
            'description' => 'Зерна зеленого кофе можно заказать в нашей кофейне с доставкой',
            'price'=>300,
            'image'=>'green.jpg'
        ]);
    }
}
