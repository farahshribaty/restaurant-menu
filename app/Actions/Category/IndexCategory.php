<?php

namespace App\Actions\Category;

use App\Actions\Base\IndexAction;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class IndexCategory extends IndexAction
{
    protected function model(): string
    {
        return Category::class;
    }
    protected function resource($models): JsonResponse
    {
        return response()->json([
            'data' => CategoryResource::collection($models),
            'message' => 'Retrieved successfully',
        ], 200);
    }

}
