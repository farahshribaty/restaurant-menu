<?php

namespace App\Actions\Item;

use App\Actions\Base\CreateAction;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateItem extends CreateAction
{
    protected function model(): string
    {
        return Item::class;
    }

    protected function rules(Request $request): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'data' => new ItemResource($model),
            'message' => 'Created successfully',
        ], 201);
    }
}
