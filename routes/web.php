<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
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


Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/config', [ProfileController::class, 'config'])->name('profile.config');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Cargar posts
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Dar like
Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.toggleLike');
// Comentar post
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
// Eliminar comentario
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');
//Borrar post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/search', [SearchController::class, 'search'])->name('search')->middleware('auth');
Route::get('/search/{name}', [SearchController::class, 'perfil'])->name('search.perfil')->middleware('auth');


Route::get('/messages', function () {
    return view('messages');
})->name('messages')->middleware('auth');


require __DIR__ . '/auth.php';
