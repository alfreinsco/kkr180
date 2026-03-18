<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'alfreinsco@gmail.com',
        ], [
            'name' => 'Alfreinsco',
            'password' => Hash::make('alfreinsco@gmail.com'),
            'is_admin' => true,
        ]);
    }
}
