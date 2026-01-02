<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'user_id' => 1,
            'category_id' => Category::all()->random()->id,
            'title' => $title,
            'slug' => str($title)->slug(),
            'body' => $this->faker->paragraph(5, true),
            'published_at' => now()
        ];
    }
}
