<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = 'Tester5000';
        User::create([
            'name' => "Tester",
            'email' => 'tester@mail.ru',
            'password' => Hash::make($password),
            'role_id'=>2,
        ]);
    }
}
