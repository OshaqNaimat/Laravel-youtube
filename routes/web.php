<?php

use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/studio','studio');


Route::post('/upload-video',[VideoController::class,'uploadVideo']);


Route::get('/',[VideoController::class,'getVideos']);
