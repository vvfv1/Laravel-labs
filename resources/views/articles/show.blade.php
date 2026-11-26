@extends('layouts.app')

@section('title', $article->title)

@section('content')

    <h1>{{ $article->title }}</h1>

    <p>
        <strong>Автор:</strong> {{ $article->author }}
    </p>

    <p>{{ $article->description }}</p>

    @if ($article->image)
        <img
            src="{{ $article->image }}"
            alt="{{ $article->title }}"
            width="400"
        >
    @endif

    <p>
        <small>Дата публикации: {{ $article->created_at }}</small>
    </p>

    <br>

    <a href="{{ route('articles.index') }}">Вернуться к новостям</a>

@endsection
