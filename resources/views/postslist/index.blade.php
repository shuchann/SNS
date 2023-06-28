<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>みんなの投稿</title>
    <header class="header">
    <h1 class="header_title">SHUTOOS</h1>
    <!--新規投稿ボタン-->
    <button type="button" class="button" onclick="location.href='{{ route('create') }}' ">NEW POSTS</button>
    <!--プロフィール画面に移動するボタン-->
    <button type="button" class="button" onclick="location.href='{{ route('purohu') }}'">PROFILE</button>
    
     @auth
         <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit" class="button">LOG OUT</button>
        </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
    @endauth
    </header>
    
    <link rel="stylesheet" href="/css/index.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
    <body>
        <h1 class="title">POSTS LIST</h1>
        
        <!--検索機能-->
        @auth
        <div class="search">
            <form action="{{ route('search.search') }}" method="POST">
                @csrf
                <input type="text" name="keyword"  placeholder="検索ワードを入力">
                <input type="submit" class="search_btn" value="SEARCH">
            </form>
        </div>
        @endauth
        
        <!--投稿表示機能-->
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
        <!--いいね機能-->
        <div>
        @if($post->is_nice_by_auth_user())
            <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->nice->count() }}</span></a>
        
        @else
            <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->nice->count() }}</span></a>
        @endif
        </div>
    </body>
</html>