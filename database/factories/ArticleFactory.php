<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'author' => fake()->name(),
            'description' => fake()->paragraph(5),
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}
