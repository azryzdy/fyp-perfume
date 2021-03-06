<?php


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;

use App\Http\Controllers\Api\AuthProductController;
use App\Http\Controllers\Api\AuthSubCategoryController;
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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('myinfo', function() { return auth()->user(); });

  Route::get("logout",[AuthController::class,'logout']);
});


Route::post("login",[AuthController::class,'getToken']);
Route::post("register",[AuthController::class,'register']);
Route::get("list",[AuthProductController::class,'list']); 
Route::get("subcategory",[AuthSubCategoryController::class,'subcategory']); 
Route::get('category','App\Http\Controllers\Api\AuthCategoryController@category');
Route::get('payment',[PaymentController::class,'getpayment']);
Route::post('payment',[PaymentController::class,'createpayment']);
Route::delete('payment',[PaymentController::class,'cancelpayment']);
Route::get('paymentdetails',[PaymentController::class,'getpaymentdetails']);