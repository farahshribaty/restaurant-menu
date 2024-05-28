<?php

namespace App\Actions\Item;

use App\Actions\Base\IndexAction;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

class IndexItem extends IndexAction
{
    protected function model(): string
    {
        return Item::class;
    }
    protected function resource($models): JsonResponse
    {
        return response()->json([
            'data' => ItemResource::collection($models),
            'message' => 'Retrieved successfully',
        ], 200);
    }

}
