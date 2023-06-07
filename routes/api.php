<?php

use App\Http\Controllers\AuthController;
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


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::middleware('auth:sanctum')->post('logout', 'logout');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('category', App\Http\Controllers\CategoryController::class)->except('store', 'update', 'destroy');

    Route::apiResource('course', App\Http\Controllers\CourseController::class)->except('store', 'update', 'destroy');

    Route::apiResource('institute', App\Http\Controllers\InstituteController::class)->except('store', 'update', 'destroy');

    Route::apiResource('suggestion', App\Http\Controllers\SuggestionController::class)->only('store');

    Route::apiResource('registeration', App\Http\Controllers\RegisterationController::class)->only('store');
});
