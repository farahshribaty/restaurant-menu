<?php

namespace App\Traits;

use App\Models\Discount;

trait EffectiveDiscount{
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

        $globalDiscount = Discount::globalDiscount()->first();
        return $globalDiscount ? $globalDiscount->percentage : 0;
    }
}