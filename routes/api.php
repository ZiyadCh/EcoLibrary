<?php

use App\Http\Controllers\API\V1\AuthController as V1AuthController;
use App\Http\Controllers\API\V1\LivreController as V1LivreController;
use App\Http\Controllers\API\V2\LivreController as V2LivreController;
use App\Http\Controllers\API\V1\CategorieController as V1CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('/register', [V1AuthController::class,'register']);
});

Route::prefix('v1')->group(function () {
    Route::post('/login', [V1AuthController::class,'login']);
});

Route::prefix('v1')->group(function () {
    Route::apiResource('livres', V1LivreController::class)->middleware('auth:sanctum');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('categorie', V1CategorieController::class)->middleware('auth:sanctum');
});
