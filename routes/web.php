<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

use App\Http\Controllers\Request;

use App\Http\Controllers\FollowController;

use App\Http\Controllers\CommentController;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//投稿はPostController
Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

    
//フォローはFollowController
Route::resource('follows', FollowController::class)->only([
    'index', 'store', 'destroy'
    ]);
    
// Route::get('/follower', [FollowController::class, 'followerIndex']);

Route::resource('users', UserController::class)->only([
  'show', 
]);

Auth::routes();