<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorites;

class FavoriteController extends Controller
{
    public function getAllFavorites(Request $request){
        $favorites = Favorites::all();

        return response()->json([
            "status" => "Success",
            "favorites" => $favorites
        ],200);
    }

    public function addFavorite(Request $request){
        $favorites = new Favorites;
        $favorites->user_id = $request->user_id;
        $favorites->item_id = $request->item_id;
        $favorites->save();

        return response()->json([
            "status" => "Success",
        ],200);
    }

    public function getFavoritesById(Request $request){
        $user_id = $request->user_id;
        $favorites = Favorites::where('user_id', $user_id)->get();

        return response()->json([
            "status" => "Success",
            "favorites" => $favorites,
        ],200);
    }
}
