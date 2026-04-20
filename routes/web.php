<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SaveVideoController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/studio', 'studio')->middleware('auth');
Route::view('/register', 'auth')->name('login');
Route::view('/searched-videos/{title}', 'searchedVideos');
Route::view('/saved-video', 'saved-video');
Route::view('/liked-videos', 'liked-videos');
Route::view('/your-stats', 'your-stats');

Route::post('/upload-video', [VideoController::class, 'uploadVideo']);
Route::post('/register-user', [UserController::class, 'registerUser']);
Route::post('/logout', [UserController::class, 'logoutUser']);
Route::post('/login-user', [UserController::class, 'loginUser']);
Route::post('/add-comment', [CommentsController::class, 'createComment']);
Route::post('/search', [VideoController::class, 'searchedItems']);
Route::post('/singleVideo/{id}', [VideoController::class, 'getSingleVideo']);
Route::post('/save-video', [SaveVideoController::class, 'saveVideo']);
Route::middleware('auth')->post('/subscribe', [SubscriptionController::class, 'toggle'])->name('subscribe.toggle');
Route::post('/video/like', [VideoController::class, 'likeVideo'])->name('video.like');

Route::get('/saved-video', [SaveVideoController::class, 'savedVideosPage']);
Route::get('/', [VideoController::class, 'getVideos']);
Route::get('/get-comments', [CommentsController::class, 'getComments']);
Route::get('/singleVideo/{id}', [VideoController::class, 'getSingleVideo'])->name('singlepage');
Route::get('/get-relavent-video', [VideoController::class, 'relaventItems']);
Route::get('/liked-videos', [VideoController::class, 'showLikedVideos'])
    ->middleware('auth')
    ->name('liked.videos');
Route::get('/my-videos', [VideoController::class, 'myVideos'])->middleware('auth');
