<?php

namespace App\Actions\Category;

use App\Actions\Base\CreateAction;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateCategory extends CreateAction
{
    protected function model(): string
    {
        return Category::class;
    }

    protected function rules(Request $request): array
    {
        return [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
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
