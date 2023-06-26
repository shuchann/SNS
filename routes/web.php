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
    
    //ホーム画面
    Route::get('/', [PostController::class, 'index']);
    Route::get('/', [PostController::class, 'index'])->name('postslist.index');

    // 新規投稿画面
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    // 投稿詳細画面
    Route::get('/posts/{post}', [PostController::class ,'show'])->name('postslist.show');
    // 検索結果画面
    Route::post('/search', [PostController::class, 'search'])->name('search.search');
    // 更新
    Route::put('/posts/{post}', [PostController::class, 'update']);
    // 投稿編集
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
    // 投稿削除
    Route::delete('/posts/{post}', [PostController::class,'delete'])->name('delete_posts');
    // 写真表示
    Route::post('/posts', [PostController::class, 'store']);
    // プロフィール画面
    Route::get('/user', function (){
        return view('posts.purohu')->with(['user' => Auth::user()]);
    })->name('purohu');
    
    
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', function(){
    //   return view('dashboard'); 
    // })->name('dashboard');
});


require __DIR__.'/auth.php';