<?php

namespace App\Actions\Category;

use App\Actions\Base\ShowAction;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ShowCategory extends ShowAction
{
    protected function model(): string
    {
        return Category::class;
    }

    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource($model),
            'message' => 'Retrieved successfully',
        ], 200);
    }

    public function handle($id): Model
    {
        $category = Category::with(['children', 'items'])->findOrFail($id);
        return $category;
    }
}
