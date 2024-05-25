<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => null, // Ensure to handle subcategories separately
            'path' => '',
            'depth' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            $category->path = $category->parent_id ? Category::find($category->parent_id)->path . '/' . $category->id : $category->id;
            $category->save();
        });
    }
}
