<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json([
            "status" => "Success",
        ],200);
    }

    public function getCategoryById(Request $request){
        $category = Category::find($request->id);

        return response()->json([
            "status" => "Success",
            "category" => $category,
        ],200);
    }
}
