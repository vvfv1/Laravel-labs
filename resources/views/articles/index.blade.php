@extends('layouts.app')

@section('title', 'Новости')

@section('content')

    <h1>Новости</h1>

    @foreach ($articles as $article)
        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">

            <h2>{{ $article->title }}</h2>

            <p><strong>Автор:</strong> {{ $article->author }}</p>

            <p>{{ $article->description }}</p>

            @if ($article->image)
                <img
                    src="{{ $article->image }}"
                    alt="{{ $article->title }}"
                    width="300"
                >
            @endif

            <p>
                <small>Дата публикации: {{ $article->created_at }}</small>
            </p>

        </div>
    @endforeach

@endsection
