<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});


Route::get('/allProducts', [ProductsController::class, 'AllProductsView']);
Route::get('/productsCategory', [ProductsController::class, 'ProductCategory']);
Route::get('/productsTitle', [ProductsController::class, 'ProductsTitle']);
Route::get('/filteredProducts', [ProductsController::class, 'getProductsByTitle']);



Route::post('/newProduct', [ProductsController::class, 'setNewProduct']);





