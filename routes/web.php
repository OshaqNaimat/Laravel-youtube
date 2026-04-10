<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/studio','studio')->middleware('auth');
Route::view('/register','auth')->name('login');



Route::post('/upload-video',[VideoController::class,'uploadVideo']);
Route::post('/register-user',[UserController::class,'registerUser']);
Route::post('/logout',[UserController::class,'logoutUser']);
Route::post('/login-user',[UserController::class,'loginUser']);
Route::post('/add-comment',[CommentsController::class,'createComment']);


Route::get('/get-comments',[CommentsController::class,'getComments']);
Route::get('/singleVideo/{id}',[VideoController::class,'getSingleVideo'])->name('singlepage');
Route::get('/',[VideoController::class,'getVideos']);
