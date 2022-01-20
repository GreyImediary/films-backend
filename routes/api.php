<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\FilmsController;
use Illuminate\Support\Facades\Route;

Route::get('health', function () {
    return response()->json(['status' => 'ok']);
});

Route::group(['prefix' => 'films'], function () {
    Route::get('/', [FilmsController::class, 'index']);
    Route::get('{film}', [FilmsController::class, 'show']);
    Route::post('/', [FilmsController::class, 'create']);
    Route::put('{film}', [FilmsController::class, 'update']);
    Route::delete('{film}', [FilmsController::class, 'delete']);
    Route::post('{film}/actors', [FilmsController::class, 'actors']);
});

Route::group(['prefix' => 'actors'], function () {
    Route::get('/', [ActorsController::class, 'index']);
    Route::get('{actor}', [ActorsController::class, 'show']);
    Route::post('/', [ActorsController::class, 'create']);
    Route::put('{actor}', [ActorsController::class, 'update']);
    Route::delete('{actor}', [ActorsController::class, 'delete']);
    Route::post('{actor}/films', [ActorsController::class, 'films']);
});