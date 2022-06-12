<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function getAllItems(){
        $items = Item::all();

        return response()->json([
            "status" => "Success",
            "items" => $items
        ],200);
    }

    public function getItemById(Request $request){
        $item = Item::find($request->id);
        
        return response()->json([
            "status" => "Success",
            "item" => $item
        ],200);
    }

    public function getItemByName(Request $request){
        $name = $request->name;
        $item = Item::where('name', 'LIKE', "%$name%")->get();

        return response()->json([
            "status" => "Success",
            "item" => $item,
        ],200);
    }

    public function addItem(Request $request){
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->image = $request->image;
        $item->save();

        return response()->json([
            "status" => "Success",
        ],200);
    }

    public function deleteItemById(Request $request){
        $item = Item::find($request->id);
        $item->delete();

        return response()->json([
            "status" => "Success",
        ],200);
    }

    public function getItemByCategoryId(Request $request){
        $category_id = $request->category_id;
        $item = Item::where('category_id', $category_id)->get();

        return response()->json([
            "status" => "Success",
            "items" => $item,
        ],200);
    }
}
