<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::apiResources([
    'categories.products' => CategoryProductController::class,
    'categories' => CategoryController::class,
    'favorites' => FavoriteController::class,
    'products' => ProductController::class,
]);
