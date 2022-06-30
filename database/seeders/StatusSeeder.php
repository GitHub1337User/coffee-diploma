<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'В процессе',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Ожидайте доставки',
        ]);DB::table('statuses')->insert([
            'name' => 'Отменено',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Завершено',
        ]);
    }
}
