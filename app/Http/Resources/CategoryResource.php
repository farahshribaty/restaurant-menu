<?php

namespace App\Http\Resources;

use App\Http\Resources\Base\BasePaginationCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource 
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'path' => $this->path,
            'depth' => $this->depth,
            'children' => CategoryResource::collection($this->whenLoaded('children')),
            'items' => ItemResource::collection($this->whenLoaded('items')),
            // 'discount' => new DiscountResource($this->whenLoaded('discount')),
        ];    
    }
}
