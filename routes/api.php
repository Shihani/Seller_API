<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::get('get_product/{id}', [ProductController::class,'show']);
Route::get('get_product_of_seller/{id}', [ProductController::class,'getProductOfSeller']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('get_seller_by_product/{id}', [ProductController::class,'getSellerByProduct']);


});

