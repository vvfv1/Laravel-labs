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

    <hr>

    <h2>Комментарии</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($article->comments->isEmpty())
        <p>Пока нет комментариев.</p>
    @else
        @foreach ($article->comments as $comment)
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px;">

                <p>
                    <strong>{{ $comment->user->name }}</strong>
                </p>

                <p>{{ $comment->body }}</p>

                <small>
                    {{ $comment->created_at->format('d.m.Y H:i') }}
                </small>

                @can('delete', $comment)
                    <form
                        action="{{ route('comments.destroy', $comment) }}"
                        method="POST"
                        style="margin-top: 10px;"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Удалить комментарий
                        </button>
                    </form>
                @endcan

            </div>
        @endforeach
    @endif

    <hr>

    <h2>Добавить комментарий</h2>

    @auth
        <form
            action="{{ route('comments.store', $article) }}"
            method="POST"
        >
            @csrf

            <div style="margin-bottom: 15px;">
                <textarea
                    name="body"
                    rows="4"
                    placeholder="Введите ваш комментарий"
                    style="width: 100%; padding: 10px;"
                    required
                >{{ old('body') }}</textarea>

                @error('body')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">
                Отправить комментарий
            </button>
        </form>
    @else
        <p>
            Чтобы оставить комментарий, необходимо
            <a href="{{ route('login') }}">войти в аккаунт</a>.
        </p>
    @endauth

    <br>

    <a href="{{ route('articles.index') }}">Вернуться к новостям</a>

@endsection
