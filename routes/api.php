<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::post('/products', [ProductController::class, 'importProducts']); // importar products da planilha
Route::get('/products', [ProductController::class, 'getProducts']); // ver lista de produtos em JSON
Route::get('/products/{product}', [ProductController::class, 'getProduct']); // ver detalhes de um produto em JSON   
Route::delete('/products/{product}', [ProductController::class, 'deleteProduct']); // deletar produto  
Route::get('/products_status', [ProductController::class, 'getProductsImportStatus']); // acompanhar status do ultimo import
