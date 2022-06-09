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

    public function addItem(Request $request){
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->image = $request->image;
        $item->description = $request->description;
        $item->save();

        return response()->json([
            "status" => "Success",
        ],200);

    }
}
