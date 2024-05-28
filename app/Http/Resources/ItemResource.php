<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->name,
            'original_price' => $this->price,
            'price_after_discount' => $this->price_after_discount,
            'discount' => $this->getEffectiveDiscount(),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'category_id' => $this->category_id,
        ];
    }
}
