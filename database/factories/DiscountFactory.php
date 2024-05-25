<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition()
    {
        $discountableType = $this->faker->randomElement([Category::class, Item::class]);
        $discountableId = $discountableType::inRandomOrder()->first()->id ?? $discountableType::factory();

        return [
            'discountable_type' => $discountableType,
            'discountable_id' => $discountableId,
            'percentage' => $this->faker->numberBetween(5, 50),
        ];
    }
}
