<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Hrrp\Controllers\NiceController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [PostController::class, 'index'])->name('postslist.index');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // 新規投稿画面
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    // 投稿詳細画面
    Route::get('/posts/{post}', [PostController::class ,'show'])->name('postslist.show');
    // 検索結果画面
    Route::post('/search', [PostController::class, 'search'])->name('search.search');
    // 投稿編集
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::put('/posts/{post}', [PostController::class, 'update']);
    // 投稿削除
    Route::delete('/posts/{post}', [PostController::class,'delete'])->name('delete_posts');
    // 写真表示
    Route::post('/posts', [PostController::class, 'store']);
    // プロフィール画面
    Route::get('/user', function (){
        return view('posts.purohu')->with(['user' => Auth::user()]);
    })->name('purohu');
    // いいね機能
    Route::get('/posts/like/{id}', [PostController::class, 'like'])->name('posts.like');
    Route::get('/posts/unlike/{id}', [PostController::class, 'unlike'])->name('posts.unlike');
    
    // コメント機能
    // Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
    // Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');

    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', function(){
    //   return view('dashboard'); 
    // })->name('dashboard');

    });
    require __DIR__.'/auth.php';
