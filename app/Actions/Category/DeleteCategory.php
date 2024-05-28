<?php

namespace App\Actions\Category;

use App\Actions\Base\DeleteAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class DeleteCategory extends DeleteAction
{
    protected function model(): string
    {
        return Category::class;
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'message' => 'Deleted successfully',
        ], 200);
    }
}
