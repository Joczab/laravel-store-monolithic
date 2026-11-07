<?php

use Illuminate\Support\Facades\Route;

# Controladores
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

# Rutas de productos

# https://store-api.com/products [GET]
Route::get('/products', [ProductController::class, 'getAll']);

# https://store-api.com/products/search [GET]
Route::get('/products/search', [ProductController::class, 'findByName']);

# https://store-api.com/products/<id> [GET]
Route::get('/products/{id}', [ProductController::class, 'findById']);

# https://store-api.com/products/create [POST]
Route::post('/products/create', [ProductController::class, 'insert']);

# https://store-api.com/products/update/<id> [PUT]
Route::put('/products/update/{id}', [ProductController::class, 'update']);

# https://store-api.com/products/update/<id> [PUT]
Route::delete('/products/delete/{id}', [ProductController::class, 'delete']);