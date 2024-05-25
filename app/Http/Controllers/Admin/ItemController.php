<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->get();
        $items = ItemResource::collection($items);
        return $this->sendResponse('Get Successfully' , $items);
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->validated());
        $item = new ItemResource($item);
        return $this->sendResponse('Added Successfully' , $item);
    }

    public function show(Item $item)
    {
        $item->load('category');
        $item = new ItemResource($item);
        return $this->sendResponse('Get Successfully' , $item);
    }

    public function update(ItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        $item = new ItemResource($item);
        return $this->sendResponse('Updated Successfully' , $item);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
