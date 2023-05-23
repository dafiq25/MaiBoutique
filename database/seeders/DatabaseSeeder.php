<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        users::create([
            'username' => 'member',
            'email' => 'member@gmail.com',
            'phone' => '123456789012',
            'password' => Hash::make('password'),
            'address' => 'jl.xyz',
            'role' => 'member'
        ]);
        users::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '123456789012',
            'password' => Hash::make('password'),
            'address' => 'jl.xyz',
            'role' => 'admin'
        ]);
    }
}
