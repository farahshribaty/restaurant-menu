<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'discountable_type' => $this->discountable_type,
            'discountable_id' => $this->discountable_id,
            'percentage' => $this->percentage,
        ];
    }
}
