<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'path', 'depth'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function discount()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }
    public function getEffectiveDiscount()
    {
        if ($this->discount) {
            return $this->discount->percentage;
        }

        $parent = $this->parent;
        while ($parent) {
            if ($parent->discount) {
                return $parent->discount->percentage;
            }
            $parent = $parent->parent;
        }

        $globalDiscount = Discount::where('discountable_type', 'all')->first();
        return $globalDiscount ? $globalDiscount->percentage : 0;
    }

    // private function applyDiscounts($category)
    // {
    //     $category->effective_discount = $category->getEffectiveDiscount();

    //     foreach ($category->items as $item) {
    //         $item->effective_discount = $item->getEffectiveDiscount();
    //         $item->final_price = $item->price - ($item->price * $item->effective_discount / 100);
    //     }

    //     foreach ($category->children as $child) {
    //         $this->applyDiscounts($child);
    //     }
    // }

}
