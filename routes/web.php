<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\COntrollers\RepliesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/post', function () {
    return view('post');
});

Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

Route::get('/article', [ArticleController::class, 'index'])->name('article');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/show/{article}', [HomeController::class, 'show'])->name('home.show');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('home/show/{article}/toggle-like', [LikeController::class, 'toggleLike'])->name('toggle-like');
