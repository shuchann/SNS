<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <header class="header">SHUTOOS</header>
        <link rel="stylesheet" href="/css/create.css">
    </head>
    <body>        <form action="/posts" method="POST"enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h1>NEW POSTS NAME</h1>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="image">
                <h2>IMAGE</h2>
                <input type="file" name="image">
            </div>
            <div class="kyapusyon">
                <h2>KYAPUSYON</h2>
                <textarea name="post[kyapusyon]" placeholder="○○のトップスを着てみました‼"></textarea>
            </div>
            <h1>BRAND NAME  or  PURCHASE STORE</h1>
            <div class="burando">
                <h2>HAT：</h2>
                <textarea name="post[hat]" placeholder="ブランド及び購入店"></textarea>
                <h2>TOPS：</h2>
                <textarea name="post[tops]" placeholder="ブランド及び購入店"></textarea>
                <h2>PANTS：</h2>
                <textarea name="post[pants]" placeholder="ブランド及び購入店"></textarea>
                <h2>SHOES：</h2>
                <textarea name="post[shoes]" placeholder="ブランド及び購入店"></textarea>
                <h2>ACCESSORIES：</h2>
                <textarea name="post[accessories]" placeholder="ブランド及び購入店"></textarea>
            </div>
            <input type="submit" class="posts_btn" value="POSTS"/>
        </form>
        <div class="footer">
            <a href="/">RETURN</a>
        </div>
    </body>
</html>