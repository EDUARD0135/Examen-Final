<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\contacto;

class contactoseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        contacto::factory()->count(100)->create();
    }
}
