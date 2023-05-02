<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\contacto;
use App\Models\evento;
use App\Models\nota;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(contactoseeder::class);
        $this->call(eventoseeder::class);
        $this->call(notaseeder::class);
   
    }
}
