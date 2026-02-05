<!DOCTYPE html>
<html>

<head>
    <title>投稿一覧</title>
</head>

<body>
    <h1>投稿一覧</h1>
    @foreach ($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
    </div>
    @endforeach
</body>

</html>
