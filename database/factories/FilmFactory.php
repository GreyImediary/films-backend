<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'description' => $this->faker->text(),
            'director' => $this->faker->name(),
        ];
    }
}
