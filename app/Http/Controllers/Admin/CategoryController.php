<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children', 'items')->get();

        foreach ($categories as $category) {
            $this->applyDiscounts($category);
        }

        $categories = CategoryResource::collection($categories);
        return $this->sendResponse('Get Successfully' , $categories);

    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $category = new CategoryResource($category);
        return $this->sendResponse('Added Successfully' , $category);
    }

    public function show(Category $category)
    {
        $category->load('children', 'items','discount');
        $category = new CategoryResource($category);
        return $this->sendResponse('Get Successfully' , $category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        $category = new CategoryResource($category);
        return $this->sendResponse('Updated Successfully' , $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
