<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\HouseController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Support\Facades\Route;

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

//user route
Route::group(['prefix'=>'users','namespace'=>'Api'], function (){

    Route::get('api',[UsersController::class,'index'])->middleware('auth.guard:admin-api');
    Route::put('user/update/{id}',[UsersController::class,'update']);
    Route::post('login',[UsersController::class,'login']);
    Route::post('register',[UsersController::class,'register']);
    Route::post('logout',[UsersController::class,'logout'])->middleware('auth.guard:user-api');
    Route::get('user/data',[UsersController::class,'dataUser'])->middleware('auth.guard:user-api');


});

//admin route
Route::group(['prefix'=>'admins','namespace'=>'Api'], function (){

    Route::post('login',[AdminController::class,'login']);
    Route::post('logout',[AdminController::class,'logout'])->middleware('auth.guard:admin-api');


});

//house route
Route::group(['prefix'=>'houses','namespace'=>'Api'], function (){

    Route::get('all',[HouseController::class,'index'])->middleware(['auth.guard:admin-api']);
    Route::post('create',[HouseController::class,'create'])->middleware('auth.guard:user-api');


});
