<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        $discounts = DiscountResource::collection($discounts);
        return $this->sendResponse('Get Successfully' , $discounts);
    }

    public function store(DiscountRequest $request)
    {
        $discount = Discount::create($request->validated());
        $discount = new DiscountResource($discount);
        return $this->sendResponse('Added Successfully' , $discount);
    }

    public function show(Discount $discount)
    {
        $discount = new DiscountResource($discount);
        return $this->sendResponse('Get Successfully' , $discount);
    }

    public function update(DiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());
        $discount = new DiscountResource($discount);
        return $this->sendResponse('Updated Successfully' , $discount);
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
