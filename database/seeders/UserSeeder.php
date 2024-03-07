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
     */
    public function run(): void
    {
        User::create([
            "name"     => 'midtrans user',
            "email"    => 'midtrans@gmail.com',
            "phone"    => '08761313213112',
            "password" => Hash::make("password"),
        ]);
    }
}
