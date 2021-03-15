<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\PostCommentController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\web\WebController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::prefix('dashboard')->group(function () {
    Route::resource('post', PostController::class);
    Route::post('post/{post}/image', [PostController::class, 'image'])->name('post.image');
    Route::post('post/content_image', [PostController::class, 'contentImage']);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);

    Route::resource('contact', ContactController::class)->only([
        'index', 'show', 'destroy'
    ]);

    Route::resource('post-comment', PostCommentController::class)->only([
        'index', 'show', 'destroy'
    ]);

    Route::get('post-comment/{post}/post', [PostCommentController::class, 'post'])->name('post-comment.post');
    Route::get('post-comment/j-show/{postComment}', [PostCommentController::class, 'jShow']);
    Route::post('post-comment/proccess/{postComment}', [PostCommentController::class, 'proccess']);
});



Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/categories', [WebController::class, 'category']);
Route::get('/detail/{id}', [WebController::class, 'detail']);
Route::get('/post-category/{category_id}', [WebController::class, 'post_category']);

Route::get('/contact', [WebController::class, 'contact']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
