<?php

namespace App\Traits;

trait PriceAfterDiscount{
    public function getPriceAfterDiscount()
    {
        $discount = $this->getEffectiveDiscount();
        return $this->price - ($this->price * $discount / 100);
    }
}