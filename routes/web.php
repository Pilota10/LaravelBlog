<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');


// Route::get('/posts', function () {
//     return view('posts.listado');
// }) 
// ->name('posts_listado');

// Route::get('/posts/{id}', function ($id) {
//     return view('posts.ficha', compact('id'));
// }) 
// ->name('posts_ficha')
// ->where('id', '[0-9]');

Route::get('login', [LoginController::class, 'loginForm'])->name('loginform');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/posts/nuevoPrueba', [PostsController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');
// Route::get('/posts/editarPrueba/{id}', [PostsController::class, 'editarPrueba'])->name('posts.editarPrueba');

Route::resource('posts', PostsController::class)->only([
    'index', 'show', 'create', 'edit', 'destroy', 'store', 'update'
]);
