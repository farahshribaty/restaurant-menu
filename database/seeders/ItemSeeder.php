<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch categories
        $hotAppetizers = Category::where('name', 'Hot Appetizers')->first();
        $coldAppetizers = Category::where('name', 'Cold Appetizers')->first();
        $meatDishes = Category::where('name', 'Meat Dishes')->first();
        $vegetarianDishes = Category::where('name', 'Vegetarian Dishes')->first();
        $cakes = Category::where('name', 'Cakes')->first();
        $iceCream = Category::where('name', 'Ice Cream')->first();
        $softDrinks = Category::where('name', 'Soft Drinks')->first();
        $alcoholicDrinks = Category::where('name', 'Alcoholic Drinks')->first();

        // Add items to categories
        Item::create([
            'name' => 'Spring Rolls', 
            'price' => 5.99, 
            'description' => 'Crispy spring rolls with vegetable filling.', 
            'category_id' => $hotAppetizers->id
        ]);
        Item::create([
            'name' => 'Mozzarella Sticks', 
            'price' => 6.99, 
            'description' => 'Golden fried mozzarella cheese sticks served with marinara sauce.', 
            'category_id' => $hotAppetizers->id
        ]);

        Item::create([
            'name' => 'Caesar Salad', 
            'price' => 7.99, 
            'description' => 'Classic Caesar salad with romaine lettuce, croutons, and Caesar dressing.', 
            'category_id' => $coldAppetizers->id
        ]);
        Item::create([
            'name' => 'Greek Salad', 
            'price' => 6.99, 
            'description' => 'Fresh Greek salad with tomatoes, cucumbers, olives, and feta cheese.', 
            'category_id' => $coldAppetizers->id
        ]);

        Item::create([
            'name' => 'Grilled Chicken', 
            'price' => 12.99, 
            'description' => 'Juicy grilled chicken breast served with a side of vegetables.', 
            'category_id' => $meatDishes->id
        ]);
        Item::create([
            'name' => 'Beef Steak', 
            'price' => 19.99, 
            'description' => 'Tender beef steak cooked to perfection, served with mashed potatoes.', 
            'category_id' => $meatDishes->id
        ]);

        Item::create([
            'name' => 'Vegetable Stir Fry', 
            'price' => 10.99, 
            'description' => 'Mixed vegetables stir-fried with soy sauce and garlic.', 
            'category_id' => $vegetarianDishes->id
        ]);
        Item::create([
            'name' => 'Tofu Curry', 
            'price' => 11.99, 
            'description' => 'Spicy tofu curry served with steamed rice.', 
            'category_id' => $vegetarianDishes->id
        ]);

        Item::create([
            'name' => 'Chocolate Cake', 
            'price' => 4.99, 
            'description' => 'Rich and moist chocolate cake topped with chocolate ganache.', 
            'category_id' => $cakes->id
        ]);
        Item::create([
            'name' => 'Cheesecake', 
            'price' => 5.99, 
            'description' => 'Creamy cheesecake with a graham cracker crust.', 
            'category_id' => $cakes->id
        ]);

        Item::create([
            'name' => 'Vanilla Ice Cream', 
            'price' => 3.99, 
            'description' => 'Classic vanilla ice cream made with real vanilla beans.', 
            'category_id' => $iceCream->id
        ]);
        Item::create([
            'name' => 'Chocolate Ice Cream', 
            'price' => 3.99, 
            'description' => 'Creamy chocolate ice cream made with rich cocoa.', 
            'category_id' => $iceCream->id
        ]);

        Item::create([
            'name' => 'Cola', 
            'price' => 1.99, 
            'description' => 'Refreshing cola drink.', 
            'category_id' => $softDrinks->id
        ]);
        Item::create([
            'name' => 'Lemonade', 
            'price' => 2.49, 
            'description' => 'Freshly squeezed lemonade.', 
            'category_id' => $softDrinks->id
        ]);

        Item::create([
            'name' => 'Beer', 
            'price' => 4.99, 
            'description' => 'Cold beer served in a frosty glass.', 
            'category_id' => $alcoholicDrinks->id
        ]);
        Item::create([
            'name' => 'Red Wine', 
            'price' => 6.99, 
            'description' => 'Glass of red wine.', 
            'category_id' => $alcoholicDrinks->id
        ]);
    }
}
