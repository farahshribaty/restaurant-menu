<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appetizers = Category::create(['name' => 'Appetizers', 'depth' => 1, 'path' => '']);
        $mainCourses = Category::create(['name' => 'Main Courses', 'depth' => 1, 'path' => '']);
        $desserts = Category::create(['name' => 'Desserts', 'depth' => 1, 'path' => '']);
        $beverages = Category::create(['name' => 'Beverages', 'depth' => 1, 'path' => '']);

        // Create subcategories
        $hotAppetizers = Category::create(['name' => 'Hot Appetizers', 'parent_id' => $appetizers->id, 'depth' => 2, 'path' => $appetizers->id]);
        $coldAppetizers = Category::create(['name' => 'Cold Appetizers', 'parent_id' => $appetizers->id, 'depth' => 2, 'path' => $appetizers->id]);

        $meatDishes = Category::create(['name' => 'Meat Dishes', 'parent_id' => $mainCourses->id, 'depth' => 2, 'path' => $mainCourses->id]);
        $vegetarianDishes = Category::create(['name' => 'Vegetarian Dishes', 'parent_id' => $mainCourses->id, 'depth' => 2, 'path' => $mainCourses->id]);

        $cakes = Category::create(['name' => 'Cakes', 'parent_id' => $desserts->id, 'depth' => 2, 'path' => $desserts->id]);
        $iceCream = Category::create(['name' => 'Ice Cream', 'parent_id' => $desserts->id, 'depth' => 2, 'path' => $desserts->id]);

        $softDrinks = Category::create(['name' => 'Soft Drinks', 'parent_id' => $beverages->id, 'depth' => 2, 'path' => $beverages->id]);
        $alcoholicDrinks = Category::create(['name' => 'Alcoholic Drinks', 'parent_id' => $beverages->id, 'depth' => 2, 'path' => $beverages->id]);
    
    }
}
