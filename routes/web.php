<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::view('/dashboard', "dashboard")->name('dashboard');

    //CRUD User:
    Route::get('/user', [UserController::class, "index_view"])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});

Route::resource('kategori', CategoryController::class);
Route::resource('post', PostController::class);
Route::get('/post/{id}/konfirmasi', [PostController::class, 'konfirmasi']);
Route::get('/post/{id}/destroy', [PostController::class, 'destroy']);
