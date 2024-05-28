<?php

namespace App\Actions\Discount;

use App\Actions\Base\DeleteAction;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class DeleteDiscount extends DeleteAction
{
    protected function model(): string
    {
        return Discount::class;
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'message' => 'Deleted successfully',
        ], 200);
    }

}
