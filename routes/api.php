<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
    'as' => 'api.',
], function () {
    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.',
    ], function () {
        Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])
            ->name('login');
        Route::post('register', [\App\Http\Controllers\LoginController::class, 'register'])
            ->name('register');
    });

    Route::group([
        'middleware' => 'auth:sanctum',
    ], function () {
        Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index']);
        Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store']);
        Route::get('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'show']);
        Route::put('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'update']);
        Route::delete('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'destroy']);
    });

 
});
