<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->create([
            'name' => 'Jhon Doe',
            'username' => 'jhondoe',
            'nip'   =>  '1234567890', // NIP
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('root'), // password
            'avatar'    =>  'default.png',
            'remember_token' => Str::random(10),
            'role_id' => 1, // admin
        ]);
        UserFactory::new()->count(10)->create();
    }
}
