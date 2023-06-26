<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Cloudinary;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   
    // 検索
    public function index(Post $post, Request $request)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $keyword = $request -> input('keyword');
        
        $query = Post::query();
        
        if(!empty($keyword)) {
            $query -> where('title', 'LIKE', "%{$keyword}%");
        }
        
        $posts = $query -> get();
        
        return view('postslist.index', compact('posts', 'keyword'));
    }
    
    // 投稿詳細
    public function show(Post $post)
    {
        return view('postslist.show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    //public function index(Request $request) //検索
    
    //新規投稿
    public function create() 
    {
        return view('posts.create');
    }
    
    // 写真表示
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $image = $request->file('image');
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        $post->fill($input);
        $post->user_id=Auth::id();
        $post->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post) //編集
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post) //削除
    {
        $post->delete();
        return redirect('/');
    }
    
    // 検索
    public function search(Request $request)
    {
        $keyword = $request -> input('keyword');
        
        $query = Post::query();
        
        if(!empty($keyword)) {
            $query -> where('title', 'LIKE', "%{$keyword}%");
        }
        
        $posts = $query -> get();
        
        return view('search.search', compact('posts', 'keyword'));
    }
    
    // プロフィール

}