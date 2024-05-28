<?php

namespace App\Actions\Item;

use App\Actions\Base\ShowAction;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ShowItem extends ShowAction
{
    protected function model(): string
    {
        return Item::class;
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'data' => new ItemResource($model),
            'message' => 'Retrieved successfully',
        ], 200);
    }

}
