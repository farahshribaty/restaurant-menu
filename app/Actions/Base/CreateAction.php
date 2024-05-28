<?php 

namespace App\Actions\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

abstract class CreateAction
{
    use AsAction, AsController;

    abstract protected function model(): string;

    abstract protected function rules(Request $request): array;
    abstract protected function resource(Model $model): JsonResponse;


    public function handle(array $data): Model
    {
        $modelClass = $this->model();
        return $modelClass::create($data);
    }

    public function asController(Request $request): JsonResponse
    {
        $data = $request->validate($this->rules($request));
        $model = $this->handle($data);
        return $this->resource($model);
    }
}
