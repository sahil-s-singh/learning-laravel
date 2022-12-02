<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    Comment,
    Category
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommentCategory>
 */
class CategoryCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'comment_id' => Comment::all()->random()->id
        ];
    }
}
