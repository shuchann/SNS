<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>みんなの投稿</title>
    <header class="header">
    <h1 class="header_title">SHUTOOS</h1>
    <button type="button" class="button" onclick="location.href='{{ route('create') }}' ">NEW POSTS</button>
    <button type="button" class="button" onclick="location.href='{{ route('purohu') }}'">PROFILE</button>

    <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button type="submit" class="button">LOG OUT</button>
        </form>
    </header>
    <link rel="stylesheet" href="/css/index.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
    <body>
        <h1 class="title">POSTS LIST</h1>
        <div class="search">
            <form action="{{ route('search.search') }}" method="POST">
                @csrf
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="検索ワードを入力">
                <input type="submit" class="search_btn" value="SEARCH">
            </form>
        </div>
        <div class='posts'>
            @forelse ($posts as $post)
                <div class='post'>
                    <h2 class='title_link'>
                        <a href="/posts/{{ $post->id }}">POSTS NAME：{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <img src="{{ $post->image_url }}" alt="">
                </div>
            @empty
                <p>関連投稿がありません。</p>
            @endforelse
        </div>
    </body>
</html>