<?php 

namespace App\Actions\Item;

use App\Actions\Base\DeleteAction;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class DeleteItem extends DeleteAction
{
    protected function model(): string
    {
        return Item::class;
    }
    protected function resource(Model $model): JsonResponse
    {
        return response()->json([
            'message' => 'Deleted successfully',
        ], 200);
    }
    
}
