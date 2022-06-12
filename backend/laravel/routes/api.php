<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\HTTP\Controllers\FavoriteController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::get('/items', [ItemController::class, 'getAllItems'])->name("get-all-items");
Route::get('/item', [ItemController::class, 'getItemById'])->name("get-item-by-id");
Route::post('/add-item', [ItemController::class, 'addItem'])->name("add-item");
Route::post('/add-category', [CategoryController::class, 'addCategory'])->name("add-category");
Route::post('/delete-item', [ItemController::class, 'deleteItemById'])->name("delete-item");
Route::get('/get-category-id', [CategoryController::class, 'getCategoryById'])->name("get-category-id");
Route::get('/get-category-name', [CategoryController::class, 'getCategoryByName'])->name("get-category-name");
Route::get('/get-all-categories', [CategoryController::class, 'getAllCategories'])->name("get-all-categories");
Route::get('/get-item-by-name', [ItemController::class, 'getItemByName'])->name("get-item-by-name");
Route::get('/get-all-favorites', [FavoriteController::class, 'getAllFavorites'])->name("get-all-favorites");
Route::post('/add-favorite', [FavoriteController::class, 'addFavorite'])->name("add-favorite");