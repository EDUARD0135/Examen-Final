<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\nota;

class notaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        nota::factory()->count(100)->create();
    }
}
