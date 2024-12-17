<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/product', ProductController::class);
Route::post('/order/{id}/return', [OrderController::class, 'returnOrder']);
Route::post('/order/{id}/pay', [OrderController::class, 'payOrder']);
Route::apiResource('/order', OrderController::class);
