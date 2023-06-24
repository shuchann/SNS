<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    <header class="header">
            <h1 class="header_title">SHUTOOS</h1>
            <button type="button" class="button" onclick="location.href='{{ route('create') }}' ">NEW POSTS</button>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button type="submit" class="button">LOG OUT</button>
        </form>
    </header>        <link rel="stylesheet" href="/css/edit.css">

    </head>
    <body>
        <h1 class="title">EDITING SCREEN</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="title">
                    <h1>POSTS NAME</h1>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}">
                </div>
                <div class="image">
                　<h2>IMAGE</h2>
                　<img src="{{$post->image_url}}" alt="">
                　<input type="file" name="image">
                </div>
                <div class="kyapusyon">
                    <h2>KYAPUSYON</h2>
                    <textarea name="post[kyapusyon]" placeholder="○○のトップスを着てみました‼">{{ $post->kyapusyon }}</textarea>
                </div>
                <h1>ブランド及び購入店</h1>
                <div class="burando">
                    <h2>HAT：</h2>
                    <textarea name="post[hat]" placeholder="ブランド及び購入店">{{ $post->hat }}</textarea>
                    <h2>TOPS：</h2>
                    <textarea name="post[tops]" placeholder="ブランド及び購入店">{{ $post->tops }}</textarea>
                    <h2>PANTS：</h2>
                    <textarea name="post[pants]" placeholder="ブランド及び購入店">{{ $post->pants }}</textarea>
                    <h2>SHOES：</h2>
                    <textarea name="post[shoes]" placeholder="ブランド及び購入店">{{ $post->shoes }}</textarea>
                    <h2>ACCESSORIES：</h2>
                    <textarea name="post[accessories]" placeholder="ブランド及び購入店">{{ $post->accessories }}</textarea>
                </div>
                <input type="submit" class="button" value="REPOSTS">
            </form>
        <div class="footer">
            <a href="/">RETURN</a>
        </div>
</html>