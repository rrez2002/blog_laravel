<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', [HomeController::class, 'getDashboard'])->name('dashboard');
Route::get('search', [HomeController::class, 'getSearch'])->name('search');
Route::get('{id}/like', [PostController::class, 'getLikePost'])->name('like');



Route::middleware('auth')->group(function () {
    Route::resource('tag', TagController::class)->except('show');
    Route::resource('post/comment', CommentController::class)->except(['edit', 'update', 'create', 'index']);
    Route::resource('comments', CommentController::class)->only(['index', 'destroy']);
    Route::resource('post', PostController::class)->except(['show']);
    Route::delete('comments', [CommentController::class, 'allDestroy'])->name('allDestroy');
    Route::get('user/profile' , [HomeController::class , 'getProfile'])->name('profile.edit');
    Route::put('user/profile' , [HomeController::class , 'postProfile'])->name('profile.update');
});
Route::resource('post', PostController::class)->only(['show']);

