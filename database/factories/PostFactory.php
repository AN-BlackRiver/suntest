<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Hash;
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
            'content' => fake()->paragraph(),
            'profile_id' => Profile::first()->id,
            'is_published' => fake()->boolean(),
            'category_id' => Category::all()->random()->id,
            'views' => $this->faker->randomNumber(),
            'published_at' => $this->faker->date(),
        ];
    }
}
