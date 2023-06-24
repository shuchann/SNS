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

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{post}', [PostController::class ,'show'])->name('postslist.show');
    Route::get('/', [PostController::class, 'index'])->name('postslist.index');
    Route::post('/search', [PostController::class, 'search'])->name('search.search');

    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    
     Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    
    // Route::get('/dashboard', function(){
    //   return view('dashboard'); 
    // })->name('dashboard');
});


require __DIR__.'/auth.php';