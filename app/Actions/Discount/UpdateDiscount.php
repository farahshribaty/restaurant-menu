<?php

namespace App\Actions\Discount;

use App\Actions\Base\UpdateAction;
use App\Http\Resources\CategoryResource;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateDiscount extends UpdateAction
{
    protected function model(): string
    {
        return Discount::class;
    }

    protected function rules(Request $request): array
    {
        return [
            'discountable_type' => 'sometimes|string',
            'discountable_id' => 'sometimes|integer',
            'percentage' => 'sometimes|numeric|min:0|max:100',
        ];
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource($model),
            'message' => 'Updated successfully',
        ], 200);
    }

}
