<?php

namespace App\Actions\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

abstract class ShowAction{

    use AsAction , AsController;

    abstract protected function model(): string;
    abstract protected function resource(Model $model): JsonResponse;

    public function handle($id): Model
    {
        $modelClass = $this->model();
        return $modelClass::findOrFail($id);
    }

    public function asController($id): JsonResponse
    {
        $model = $this->handle($id);
        return $this->resource($model);
    }
}