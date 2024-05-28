<?php

namespace App\Actions\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

abstract class IndexAction{
    use AsAction , AsController;
    
    abstract protected function model(): string;
    abstract protected function resource(Model $model): JsonResponse;


    public function handle()
    {
        $modelClass = $this->model();
        return $modelClass::all();
    }
    public function asController(): JsonResponse
    {
        $models = $this->handle();
        return $this->resource($models);
    }

}