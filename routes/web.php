<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class ,'show'])
    ->name('postslist.show');

Route::get('/', [PostController::class, 'index'])
    ->name('postslist.index');

Route::put('/posts/{post}', [PostController::class, 'update']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::delete('/posts/{post}', [PostController::class,'delete']);
require __DIR__.'/auth.php';