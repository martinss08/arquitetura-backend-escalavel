<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

    Route::get('/produto',      [ProdutoController::class, 'index']);
    Route::post('/produto',     [ProdutoController::class, 'store']);
    Route::get('/produto/{id}', [ProdutoController::class, 'show']);
    Route::put('/produto/{id}', [ProdutoController::class, 'update']);
    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);
