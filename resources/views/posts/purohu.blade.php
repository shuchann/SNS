<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>プロフィール</title>
        <!--ヘッダー表示-->
        <header class="header">
        <h1 class="header_title">SHUTOOS</h1>
        <!--新規投稿ボタン-->
        <button type="button" class="button" onclick="location.href='{{ route('create') }}' ">NEW POSTS</button>
        <!--プロフィール画面に行くボタン-->
        <button type="button" class="button" onclick="location.href='{{ route('purohu') }}'">PROFILE</button>
        <!--ログアウトボタン-->
        <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit" class="button">LOG OUT</button>
            </form>
        </header>
        
        <!--リンク集-->
        <link rel="stylesheet" href="/css/purohu.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--投稿者の情報をとってくる-->
        <h1 class="title">{{ $user->name }} PROFILE</h1>
        <!--投稿者の投稿のみ表示-->
        <div class='posts'>
            @forelse ($user->posts as $post)
                <div class='post'>
                    <h2 class='title_link'>
                        <a href="/posts/{{ $post->id }}">POSTS NAME：{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <img class="img" src="{{ $post->image_url }}" alt="">
                </div>
            @empty
                <p>投稿がありません</p>
            @endforelse
        </div>
        <footer>
            <!--戻るボタン-->
            <button type="submit" class="button" onclick="location.href='{{ route('postslist.index') }}'">RETURN</button>
        </footer>
    </body>
</html>