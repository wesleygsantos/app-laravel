<?php

use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::apiResource('/produtos', ProdutoController::class);


Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
