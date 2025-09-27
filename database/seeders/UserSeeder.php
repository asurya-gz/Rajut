<?php

namespace Database\Seeders;

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
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@loope.id'],
            [
                'name' => 'LoopE Admin',
                'phone' => '081299900000',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'user@loope.id'],
            [
                'name' => 'LoopE Customer',
                'phone' => '081288877766',
                'password' => Hash::make('user12345'),
                'role' => 'user',
            ]
        );
    }
}
