<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>投稿</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>投稿名</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="image">
                <h2>画像</h2>
                <input type="file" name="image">
            </div>
            <div class="kyapusyon">
                <h2>キャプション</h2>
                <textarea name="post[kyapusyon]" placeholder="○○のトップスを着てみました‼"></textarea>
            </div>
            <h3>ブランド及び購入店</h3>
            <div class="burando">
                <h2>HAT：</h2>
                <textarea name="post[hat]" placeholder="ブランド及び購入店"></textarea>
                <h2>TOPS</h2>
                <textarea name="post[tops]" placeholder="ブランド及び購入店"></textarea>
                <h2>PANTS</h2>
                <textarea name="post[pants]" placeholder="ブランド及び購入店"></textarea>
                <h2>SHOES</h2>
                <textarea name="post[shoes]" placeholder="ブランド及び購入店"></textarea>
                <h2>ACCESSORIES</h2>
                <textarea name="post[accessories]" placeholder="ブランド及び購入店"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>