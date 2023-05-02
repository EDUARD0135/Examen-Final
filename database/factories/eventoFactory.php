<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\evento;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class eventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>fake()->word(),
            'descripción'=>fake()->text(),
            'fecha_inicio'=>fake()->datetime(),
            'fecha_fin'=>fake()->datetime(),
            'contacto_id'=>fake()->numberbetween(1,100)
        ];
    }
}
