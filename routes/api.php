<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardsController;
use App\Http\Controllers\UserSettingController;
use App\Models\UserPaymentCards;
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
Route::post('change-password', [AuthController::class, 'changePassword']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::get('products/{product}/related', [ProductController::class, 'related']);

Route::apiResources([
    'orders' => OrderController::class,
    'reviews' => ReviewController::class,
    'statuses' => StatusController::class,
    'products' => ProductController::class,
    'settings' => SettingController::class,
    'favorites' => FavoriteController::class,
    'categories' => CategoryController::class,
    'user-settings' => UserSettingController::class,
    'payment-types' => PaymentTypeController::class,
    'user-addresses' => UserAddressController::class,
    'statuses.orders' => StatusOrderController::class,
    'products.reviews' => ProductReviewController::class,
    'delivery-methods' => DeliveryMethodController::class,
    'payment-card-types' => PaymentCardTypeController::class,
    'categories.products' => CategoryProductController::class,
    'user-payment-cards' => UserPaymentCardsController::class,
]);
