<?php

namespace App\Actions\Discount;

use App\Actions\Base\ShowAction;
use App\Http\Resources\CategoryResource;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ShowDiscount extends ShowAction
{
    protected function model(): string
    {
        return Discount::class;
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource($model),
            'message' => 'Retrieved successfully',
        ], 200);
    }

}
