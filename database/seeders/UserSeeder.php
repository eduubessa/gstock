<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'John Doe',
            'username' => 'john.doe',
            'password' => 'password',
            'email' => 'john.doe@alcinovagos.io',
            'email_verified_at' => now(),
        ]);
    }
}
