<?php 

namespace App\Actions\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

abstract class DeleteAction
{
    use AsAction, AsController;

    abstract protected function model(): string;
    abstract protected function resource(Model $model): JsonResponse;


    public function handle(Model $model): bool
    {
        return $model->delete();
    }

    public function asController($id) : JsonResponse
    {
        $modelClass = $this->model();
        $model = $modelClass::findOrFail($id);
        $this->handle($model);
        return $this->resource($model);
    }
}
