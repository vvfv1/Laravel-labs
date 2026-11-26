<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая статья</title>
</head>
<body>
    <h1>Добавлена новая статья!</h1>

    <p>В системе опубликована новая статья.</p>

    <h2>{{ $article->title }}</h2>

    <p>
        <strong>Автор:</strong> {{ $article->author }}
    </p>

    <p>
        <strong>Описание:</strong>
        {{ $article->description }}
    </p>

    <p>
        <strong>Дата добавления:</strong>
        {{ $article->created_at->format('d.m.Y H:i') }}
    </p>

    <p>Это автоматическое уведомление от сайта.</p>
</body>
</html>
