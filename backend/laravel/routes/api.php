<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

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