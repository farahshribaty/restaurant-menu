<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with(['children.children.children', 'items'])->whereNull('parent_id')->get();

        foreach ($categories as $category) {
            $this->applyDiscounts($category);
        }

        $categories = CategoryResource::collection($categories);
        return $this->sendResponse('Get Successfully' , $categories);
    }

    private function applyDiscounts($category)
    {
        // $category->effective_discount = $category->getEffectiveDiscount();

        foreach ($category->items as $item) {
            $item->effective_discount = $item->getEffectiveDiscount();
            $item->final_price = $item->price - ($item->price * $item->effective_discount / 100);
        }

        foreach ($category->children as $child) {
            $this->applyDiscounts($child);
        }
    }
}
