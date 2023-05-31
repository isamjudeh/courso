<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return new CategoryCollection($categories);
    }

    public function show(Request $request, Category $category)
    {
        $category->load('courses');
        return new CategoryResource($category);
    }
}
