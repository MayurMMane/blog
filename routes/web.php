<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::resource('blogs', BlogController::class);
Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class);
Route::get('/all_blogs', [BlogController::class, 'showAllBlogs'])->name('all_blogs');
Auth::routes();
