<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="title">
                    <h2>投稿名</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}">
                </div>
                <div class="kyapusyon">
                    <h2>キャプション</h2>
                    <textarea name="post[kyapusyon]" placeholder="○○のトップスを着てみました‼">{{ $post->kyapusyon }}</textarea>
                </div>
                <h2>ブランド及び購入店</h2>
                <div class="burando">
                    <h4>HAT：</h4>
                    <textarea name="post[hat]" placeholder="ブランド及び購入店">{{ $post->hat }}</textarea>
                    <h4>TOPS</h4>
                    <textarea name="post[tops]" placeholder="ブランド及び購入店">{{ $post->tops }}</textarea>
                    <h4>PANTS</h4>
                    <textarea name="post[pants]" placeholder="ブランド及び購入店">{{ $post->pants }}</textarea>
                    <h4>SHOES</h4>
                    <textarea name="post[shoes]" placeholder="ブランド及び購入店">{{ $post->shoes }}</textarea>
                    <h4>ACCESSORIES</h4>
                    <textarea name="post[accessories]" placeholder="ブランド及び購入店">{{ $post->accessories }}</textarea>
                </div>
                <input type="submit" value="編集投稿">
            </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</html>