@extends('layouts.app')

@section('title', 'Редактировать новость')

@section('content')

    <h1>Редактировать новость</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="title">Заголовок:</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $article->title) }}"
            >
        </div>

        <br>

        <div>
            <label for="author">Автор:</label><br>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author', $article->author) }}"
            >
        </div>

        <br>

        <div>
            <label for="description">Описание:</label><br>
            <textarea
                id="description"
                name="description"
                rows="5"
                cols="50"
            >{{ old('description', $article->description) }}</textarea>
        </div>

        <br>

        <div>
            <label for="image">Ссылка на изображение:</label><br>
            <input
                type="text"
                id="image"
                name="image"
                value="{{ old('image', $article->image) }}"
            >
        </div>

        <br>

        <button type="submit">Сохранить изменения</button>

    </form>

    <br>

    <a href="{{ route('articles.index') }}">Вернуться к новостям</a>

@endsection
