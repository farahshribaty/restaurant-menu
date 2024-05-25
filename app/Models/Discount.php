<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = ['discountable_type', 'discountable_id', 'percentage'];

    public function discountable()
    {
        return $this->morphTo();
    }
}
