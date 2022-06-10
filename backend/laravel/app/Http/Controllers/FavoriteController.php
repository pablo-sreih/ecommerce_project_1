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
}
