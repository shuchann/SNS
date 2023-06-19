<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('postslist.index')->with(['posts' => $post->get()]);
    }
    public function show(Post $post)
    {
        return view('postslist.show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
