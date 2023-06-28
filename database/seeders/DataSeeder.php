<?php

namespace Database\Seeders;

use Database\Factories\DataFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataFactory::new()->create([
            'name' => 'Manajer'
        ]);
        DataFactory::new()->create([
            'name' => 'Teknisi'
        ]);
    }
}
