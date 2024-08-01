<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::middleware('api')->apiResource('/produtos', ProdutoController::class);
Route::apiResource('/cidades', CidadesController::class);
Route::apiResource('/marcas', MarcaController::class);


Route::middleware('api')->get('/', function () {
    return response()->json([
        'success' => true
    ]);
});

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);