<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        
        return [
            'title' => rtrim($title, '.'),
            'body' => $this->faker->paragraph(2),
            'status' => 1,
        ];
    }
}
