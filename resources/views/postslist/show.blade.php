<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿詳細画面</title>
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

        <link rel="stylesheet" href="/css/show.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!--タイトル表示-->
        <h1 class="title">
            TITLE：{{ $post->title }}
        </h1>
        <!--画像表示-->
        <div>
            <img class="img" src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
        <!--キャプション表示-->
        <div class='kyapusyon'>
            <div class='kyapusyon__post'>
                <h2 class='kyapusyon'>KYAPUSYON：{{ $post->kyapusyon }}</h2>
            </div>
        </div>
        <!--↓その他概要表示-->
        <div class='hat'>
            <div class='hat__post'>
                <h2 class='hat'>HAT:{{ $post->hat }}</h2>
            </div>
        </div>
        <div class='tops'>
            <div class='tops__post'>
                <h2 class='tops'>TOPS:{{ $post->tops }}</h2>
            </div>
        </div>
        <div class='pants'>
            <div class='pants__post'>
                <h2 class='pants'>PANTS：{{ $post->pants }}</h2>
            </div>
        </div>
        <div class='shoes'>
            <div class='shoes__post'>
                <h2 class='shoes'>SHOES：{{ $post->shoes }}</h2>
            </div>
        </div>
        <div class='accessories'>
            <div class='accessories__post'>
                <h2 class='accessories'>ACCESSORIES：{{ $post->accessories }}</h2>
            </div>
        </div>
        {{--<div>
            <h2>Comments</h2>
            @foreach ($comments as $comment)
                <p>{{ $comment->comment }}</p>
            @endforeach
        </div>--}}
        
        <footer>
            <!--投稿削除ボタン-->
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="button"　onclick="deletePost({{ $post->id }})">DELETE</button> 
            </form>
            <!--投稿編集ボタン-->
            <div class="edit">
                <button type="button" class="button" onclick="location.href='{{ route('edit',['post' => $post->id]) }}'">EDIT</button>
            </div>
            <!--投稿一覧に戻るボタン-->
            <div class="footer">
                <button type="submit" class="button" onclick="location.href='{{ route('postslist.index') }}'">RETURN</button>
            </div>
        </footer>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>