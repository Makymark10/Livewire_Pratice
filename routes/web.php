<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('main');
})->name('home');
Route::get('/post', [PostsController::class, 'create'])->name('post.create');
Route::post('/post', [PostsController::class, 'store'])->name('post.store');
