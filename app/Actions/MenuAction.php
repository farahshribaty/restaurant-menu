<?php

namespace App\Actions;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class MenuAction{

    use AsAction;

    public function handle(){

        $categories = Category::with(['children', 'items'])->whereNull('parent_id')->get();

        foreach ($categories as $category) {
            $this->applyDiscounts($category);
        }

        $categories = CategoryResource::collection($categories);
        return response()->json(['message' => 'Menu retrieved successfully', 'data' => $categories], 200);
    }
    private function applyDiscounts($category)
    {
        foreach ($category->items as $item) {
            $item->effective_discount = $item->getEffectiveDiscount();
            $item->price_after_discount = $item->getPriceAfterDiscount();
        }

        foreach ($category->children as $child) {
            $this->applyDiscounts($child);
        }
    }

    public function asController()
    {
        return $this->handle();
    }
}