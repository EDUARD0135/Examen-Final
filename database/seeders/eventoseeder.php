<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\evento;

class eventoseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        evento::factory()->count(100)->create();
    }
}
