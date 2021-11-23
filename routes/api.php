<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProcessesController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\DirectoryController;
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
//public routes
Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);
///protected routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post("/logout",[AuthController::class,'logout']);
    Route::post('/processes',[ProcessesController::class,'getProcesses']);
    Route::post('/create-directory',[DirectoryController::class,'createDirectory']);
    Route::post('/directory-list',[DirectoryController::class,'directoryList']);
});
