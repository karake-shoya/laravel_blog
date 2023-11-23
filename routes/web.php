<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return view('article');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

Route::get('/article', [ArticleController::class, 'index'])->name('article');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
