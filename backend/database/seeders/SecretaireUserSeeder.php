<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class SecretaireUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'secretaire',
            'email' => 'secretaire@example.com',
            'password' => Hash::make('987654321'),
            'NumTele' => '0000000000',
            'Adress' => 'maroc',
            'role' => 'secretaire',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
