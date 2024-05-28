<?php

namespace App\Actions\Discount;

use App\Actions\Base\CreateAction;
use App\Http\Resources\CategoryResource;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateDiscount extends CreateAction
{
    protected function model(): string
    {
        return Discount::class;
    }

    protected function rules(Request $request): array
    {
        return [
            'discountable_type' => 'required|string',
            'discountable_id' => 'required|integer',
            'percentage' => 'required|numeric|min:0|max:100',
        ];
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource($model),
            'message' => 'Created successfully',
        ], 201);
    }

}
