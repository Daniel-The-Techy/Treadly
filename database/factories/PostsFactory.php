<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{

    protected $model = Posts::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'content'=>fake()->text(500),
             'slug'=>fake()->sentence(),
             'Cover_image'=>fake()->image(),
             'Categories_id'=>2
        ];
    }
}
