<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudUser;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//đăng kí
Route::post('register',[UserController::class,'register']);

// đăng nhập
Route::post('login',[UserController::class,'login']);
//update
Route::post('update',[UserController::class,'updateProfile']);
