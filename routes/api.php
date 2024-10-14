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
// routes/api.php

Route::get('/products', [ProductsController::class, 'AllProductsView']);
Route::post('/newProduct', [ProductsController::class, 'createProduct']);
// Route::get('/menProducts', [ProductsController::class, 'MenProductsView']);
// Route::get('/womenProducts', [ProductsController::class, 'WomenProductsView']);
// Route::get('/kidsProducts', [ProductsController::class, 'KidsProductsView']);
// routes/api.php

Route::get('/productsCategory', [ProductsController::class, 'ProductCategory']);
Route::get('/productsTitle', [ProductsController::class, 'ProductsTitle']);
Route::get('/filteredProducts', [ProductsController::class, 'getProductsByTitle']);
