<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(), 
            'sumary' => $this->faker->paragraph(),
            'discription' => $this->faker->paragraph(),
            'author_id' => rand(1, Author::count()), 
            'image' => 'default_picture'.rand(1,5).'.jpg', 
            'category_id' => rand(1, Category::count()),
        ];
    }
}
