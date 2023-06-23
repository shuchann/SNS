<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>みんなの投稿</title>
    <header class="header">SHUTOOS</header>
    <link rel="stylesheet" href="/css/index.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
    <body>
        <h1>投稿一覧</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>

        <div>
            <form action="{{ route('postslist.index') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="検索ワードを入力">
                <input type="submit" value="検索">
            </form>
        </div>
        <button type="button" onclick="location.href='{{ route('create') }}' ">新規投稿</button>
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
        <a href="/">戻る</a>
    </body>
</html>