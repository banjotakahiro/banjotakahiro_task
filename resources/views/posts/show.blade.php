<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>タスク詳細</h1>
    <p>【タイトル】</p>
    <p>{{ $post->title }}</p>
    <p>【内容】</p>
    <p>{{ $post->body }}</p>
    <button onclick="location.href='/posts'">一覧へ戻る</button>
    <button onclick="location.href='/posts/{{ $post->id }}/edit'">編集する</button>
    <form action="/posts/{{ $post->id }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){ return false };">
    </form>
</body>

</html>
