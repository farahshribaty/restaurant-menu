<?php

namespace App\Models;

use App\Traits\EffectiveDiscount;
use App\Traits\PriceAfterDiscount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory , EffectiveDiscount , PriceAfterDiscount;
    protected $guarded = ['id'];
    protected $appends = ['price_after_discount'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }
}
