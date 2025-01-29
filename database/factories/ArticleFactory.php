<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_name'=> fake()->word(3),
            'article_description'=> fake()->paragraph(),
            'category_id'=> Category::inRandomOrder()->first()->id,
            'user_id' => fake()->randomDigit()
        ];
    }
}
