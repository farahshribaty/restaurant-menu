<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Actions\Category\CreateCategory;
use App\Actions\Category\UpdateCategory;
use App\Actions\Category\DeleteCategory;
use App\Actions\Category\IndexCategory;
use App\Actions\Category\ShowCategory;
use App\Actions\Discount\CreateDiscount;
use App\Actions\Discount\UpdateDiscount;
use App\Actions\Discount\DeleteDiscount;
use App\Actions\Discount\IndexDiscount;
use App\Actions\Discount\ShowDiscount;
use App\Actions\Item\CreateItem;
use App\Actions\Item\UpdateItem;
use App\Actions\Item\DeleteItem;
use App\Actions\Item\IndexItem;
use App\Actions\Item\ShowItem;

use App\Actions\MenuAction;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', IndexCategory::class);
Route::post('categories', CreateCategory::class);
Route::get('categories/{id}', ShowCategory::class);
Route::put('categories/{id}', UpdateCategory::class);
Route::delete('categories/{id}', DeleteCategory::class);

Route::get('discounts', IndexDiscount::class);
Route::post('discounts', CreateDiscount::class);
Route::get('discounts/{id}', ShowDiscount::class);
Route::put('discounts/{id}', UpdateDiscount::class);
Route::delete('discounts/{id}', DeleteDiscount::class);

Route::get('items', IndexItem::class);
Route::post('items', CreateItem::class);
Route::get('items/{id}', ShowItem::class);
Route::put('items/{id}', UpdateItem::class);
Route::delete('items/{id}', DeleteItem::class);

Route::get('menu', MenuAction::class);
