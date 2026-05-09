<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {

        if(User::where('email', 'admin@lpmbanjarbaru.com')->count() == 0) {
            User::create([
                'name' => 'Komandan LPM',
                'email' => 'admin@lpmbanjarbaru.com', 
                'password' => Hash::make('LpmSiaga2026!'), 
            ]);
        }
    }
}