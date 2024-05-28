<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function discountable()
    {
        return $this->morphTo();
    }

    public function scopeGlobalDiscount($query)
    {
        return $query->where('discountable_type', 'all');
    }
}
