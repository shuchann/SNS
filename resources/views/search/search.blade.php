<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>検索結果</title>
        <header class="header">
    <h1 class="header_title">SHUTOOS</h1>
    <!--新規投稿ボタン-->
    <button type="button" class="button" onclick="location.href='{{ route('create') }}' ">NEW POSTS</button>
    <!--プロフィール画面に移動するボタン-->
    <button type="button" class="button" onclick="location.href='{{ route('purohu') }}'">PROFILE</button>
    <!--ログアウトボタン-->
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
        <!--検索結果表示-->
        <div class='posts'>
            @forelse ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <img class="img" src="{{ $post->image_url }}" alt="">
                    
                    <!--いいね機能-->
                    {{--<div>
                    @if($post->is_nice_by_auth_user())
                        <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->nice->count() }}</span></a>
                     @else
                        <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->nice->count() }}</span></a>
                    @endif
                    </div>--}}
                </div>
            @empty
                <p>関連投稿がありません。</p>
            @endforelse
        </div>
        <!--戻るボタン-->
        <button type="submit" class="button" onclick="location.href='{{ route('postslist.index') }}'">RETURN</button>
    </body>
</html>