<?php

namespace Database\Factories\Posts;

use App\Models\Posts\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(2);

        return [
            'status' => random_int(0,1),
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => fake()->text(20),
            'description' => fake()->text(),
        ];
    }
}
