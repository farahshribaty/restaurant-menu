<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meatDishes = Category::where('name', 'Meat Dishes')->first();
        $softDrinks = Category::where('name', 'Soft Drinks')->first();
        Discount::create([
            'discountable_type' => Category::class,
            'discountable_id' => $meatDishes->id,
            'percentage' => 10,
        ]);
        Discount::create([
            'discountable_type' => Category::class,
            'discountable_id' => $softDrinks->id,
            'percentage' => 5,
        ]);

        // Apply discounts to specific items
        $grilledChicken = Item::where('name', 'Grilled Chicken')->first();
        $cheesecake = Item::where('name', 'Cheesecake')->first();
        Discount::create([
            'discountable_type' => Item::class,
            'discountable_id' => $grilledChicken->id,
            'percentage' => 15,
        ]);
        Discount::create([
            'discountable_type' => Item::class,
            'discountable_id' => $cheesecake->id,
            'percentage' => 20,
        ]);

        // Apply a global discount (All Menu Discount)
        Discount::create([
            'discountable_type' => 'all',
            'discountable_id' => 0,
            'percentage' => 5,
        ]);
    
    }
}

