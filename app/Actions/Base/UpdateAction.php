<?php

namespace App\Actions\Base;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

abstract class UpdateAction
{
    use AsAction, AsController;

    abstract protected function model(): string;

    abstract protected function rules(Request $request): array;
    abstract protected function resource(Model $model): JsonResponse;


    public function handle(Model $model, array $data): Model
    {
        $model->update($data);
        return $model;
    }
    
    public function asController(Request $request, $id): JsonResponse
    {
        $modelClass = $this->model();
        $model = $modelClass::findOrFail($id);
        $data = $request->validate($this->rules($request));
        $model = $this->handle($model, $data);
        return $this->resource($model);

        // return response()->json(['data' => $model, 'message' => 'Updated successfully'], 200);
    }
}
