
@extends('layouts.app')

@section('title', 'Новости')

@section('content')

    <h1>Новости</h1>

    <a href="{{ route('articles.create') }}">Добавить новость</a>

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
            <p>
                <a href="{{ route('articles.show', $article->id) }}">
                    Подробнее
                </a>
                <a href="{{ route('articles.edit', $article->id) }}">
                    Редактировать
                </a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                        onsubmit="return confirm('Вы действительно хотите удалить эту новость?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit">Удалить</button>

                </form>
            </p>
            
        </div>
    @endforeach

    {{-- Пагинация находится ЗА пределами цикла --}}
    <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin: 25px 0;">

        @if ($articles->onFirstPage())
            <span style="color: #aaa;">← Назад</span>
        @else
            <a href="{{ $articles->previousPageUrl() }}"
               style="padding: 8px 16px; background: #334155; color: white; text-decoration: none; border-radius: 5px;">
                ← Назад
            </a>
        @endif

        <span>
            Страница {{ $articles->currentPage() }} из {{ $articles->lastPage() }}
        </span>

        @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}"
               style="padding: 8px 16px; background: #334155; color: white; text-decoration: none; border-radius: 5px;">
                Далее →
            </a>
        @else
            <span style="color: #aaa;">Далее →</span>
        @endif

    </div>

@endsection
