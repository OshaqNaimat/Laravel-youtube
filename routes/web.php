<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/studio','studio');
Route::view('/register','auth');
Route::post('/upload-video',[VideoController::class,'uploadVideo']);
Route::post('/register-user',[UserController::class,'registerUser']);

// Route::view('/mainpage','components.mainpage');
// Route::get('/',[VideoController::class,'getVideos']);

    Route::post('/logout',[UserController::class,'logoutUser']);
    Route::post('/login-user',[UserController::class,'loginUser']);
