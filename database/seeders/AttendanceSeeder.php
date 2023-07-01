<?php

namespace Database\Seeders;

use Database\Factories\AttendanceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceFactory::new()->create();
    }
}