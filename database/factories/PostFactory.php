<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        return [
            'title' => fake()->sentence(),
            // author_id diambil dari UserFactory. author_id dan user akan digenerate bersamaan.
            // membuat 100 post dan 5 user, lalu mengacak author_id dari 100 post tsb dengan 5 user yang sudah dibuat.
            // App\Models\Post::factory(100)->recycle(User::factory(5)->create())->create();
            // Post::factory(100)->recycle([Category::factory(3)->create(), User::factory(5)->create()])->create()
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text()
        ];
    }
}
