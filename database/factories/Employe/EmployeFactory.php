<?php

namespace Database\Factories\Employe;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'codigo' => fake()->numerify('########'),
            'cnpj' => fake()->numerify('##.###.###/####-##'),
        ];
    }
}
