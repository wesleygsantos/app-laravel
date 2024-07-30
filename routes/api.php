<?php

use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::apiResource('/produtos', ProdutoController::class);
Route::apiResource('/cidades', CidadesController::class);
Route::apiResource('/marcas', MarcaController::class);


Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
