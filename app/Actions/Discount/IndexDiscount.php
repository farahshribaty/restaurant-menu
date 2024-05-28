<?php

namespace App\Actions\Discount;

use App\Actions\Base\IndexAction;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;

class IndexDiscount extends IndexAction
{
    protected function model(): string
    {
        return Discount::class;
    }
    protected function resource($models): JsonResponse
    {
        return response()->json([
            'data' => DiscountResource::collection($models),
            'message' => 'Retrieved successfully',
        ], 200);
    }
    
}
