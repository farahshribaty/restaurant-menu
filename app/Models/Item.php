<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
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

        $category = $this->category;
        while ($category) {
            if ($category->discount) {
                return $category->discount->percentage;
            }
            $category = $category->parent;
        }

        $globalDiscount = Discount::where('discountable_type', 'all')->first();
        return $globalDiscount ? $globalDiscount->percentage : 0;
       
    }
}
