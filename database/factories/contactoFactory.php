<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\contacto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contacto>
 */
class contactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstname(),
            'apellido'=>fake()->lastname(),
            'correo_electronico'=>fake()->unique()->safeEmail(),
            'telefono'=>fake()->phoneNumber()
        ];
    }
}
