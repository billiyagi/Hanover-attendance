<?php

namespace Database\Seeders;

use Database\Factories\RolesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RolesFactory::new(['name' => 'admin'])->create();
        RolesFactory::new(['name' => 'employee'])->create();
    }
}
