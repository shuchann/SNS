<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Nice;
use App\Models\Comment;
use Illuminate\Http\Request;
use Cloudinary;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller{   
    // 検索
    public function index(Post $post, Request $request)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $posts = Post::all();
        return view('postslist.index')->with(['posts' => $posts]);
    }

    // 投稿詳細
    public function show(Post $post)
    {
        return view('postslist.show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        // $comments = Comment::where('post_id', $post->id)->get();
        $nice=Nice::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
            return view('post.show', compact('post', 'nice')); //'comments'
    }

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
    
    //編集
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    //削除
    public function delete(Post $post)
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
    
    //いいね機能
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        $nice = new Nice();

        $nice->post_id = $id;
        $nice->user_id = Auth::id();
        $nice->save();
        
        session()->flash('success', 'You Niced the Posts.');
    
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $nice = Nice::where('post_id', $id)->where('user_id', Auth::id())->first();
        $nice->delete();

        session()->flash('success', 'You Unniced the Posts.');
        
        return redirect()->back();
    }
    // コメント機能
    // public function show(Post $post)
    // {
    //     $comments = Comment::where('post_id', $post->id)->get();
    //     return view('posts.show', compact('post', 'comments'));
    // }
    
}