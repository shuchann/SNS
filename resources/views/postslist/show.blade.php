<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>みんなの投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
        <div class='kyapusyon'>
            <div class='kyapusyon__post'>
                <p class='kyapusyon'>{{ $post->kyapusyon }}</p>
            </div>
        </div>
        <div class='hat'>
            <div class='hat__post'>
                <p class='hat'>{{ $post->hat }}</p>
            </div>
        </div>
        <div class='tops'>
            <div class='tops__post'>
                <p class='tops'>{{ $post->tops }}</p>
            </div>
        </div>
        <div class='pants'>
            <div class='pants__post'>
                <p class='pants'>{{ $post->pants }}</p>
            </div>
        </div>
        <div class='shoes'>
            <div class='shoes__post'>
                <p class='shoes'>{{ $post->shoes }}</p>
            </div>
        </div>
        <div class='accessories'>
            <div class='accessories__post'>
                <p class='accessories'>{{ $post->accessories }}</p>
            </div>
        </div>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
        </form>
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
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