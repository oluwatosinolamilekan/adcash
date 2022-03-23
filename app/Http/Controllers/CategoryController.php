<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::get();
        }catch (Exception $exception){
            $this->errorResource($exception->getMessage());
        }
        return CategoryResource::collection($categories);

    }
}
