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

Route::post('/products/create', [ProductController::class, 'insert']);
