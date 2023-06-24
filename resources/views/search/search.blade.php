<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>検索結果</title>
    <header class="header">
    <h1 class="header_title">SHUTOOS</h1>
    <button type="button" class="button" onclick="location.href='{{ route('create') }}' ">NEW POSTS</button>
    <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button type="submit" class="button">LOG OUT</button>
        </form>
    </header>
    <link rel="stylesheet" href="/css/search.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
    <body>
        <div class='posts'>
            @forelse ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <img src="{{ $post->image_url }}" alt="">
                </div>
            @empty
                <p>関連投稿がありません。</p>
            @endforelse
        </div>
        <a href="/">RETURN</a>
    </body>
</html>