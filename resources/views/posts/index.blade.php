<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($posts)
        <h1>タスク一覧</h1>
    @endif
    @foreach ($posts as $post)
        <a href="posts/{{ $post->id }}">{{ $post->title }}</a>
        <form action="/posts/{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){ return false };">
        </form>
    @endforeach
    <h1>新規論文投稿</h1>
    
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-2" role="alert">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/posts" method="post">
        @csrf
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name='title' value="{{ old('title') }}">
        </p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" class="body">{{ old('body') }}</textarea>
        </p>
        <input type="submit" value="Create task">
    </form>
</body>

</html>
