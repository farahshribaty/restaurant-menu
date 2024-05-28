<?php

namespace App\Models;

use App\Traits\EffectiveDiscount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , EffectiveDiscount;
    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function discount()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }
   
}
