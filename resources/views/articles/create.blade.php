@extends('layouts.app')

@section('title', 'Добавить новость')

@section('content')

    <h1>Добавить новость</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('articles.store') }}"
        method="POST"
        id="articleForm"
    >

        @csrf

        <div>
            <label for="title">Заголовок:</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
            >
        </div>

        <br>

        <div>
            <label for="author">Автор:</label><br>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author') }}"
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
            >{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label for="image">Ссылка на изображение:</label><br>
            <input
                type="text"
                id="image"
                name="image"
                value="{{ old('image') }}"
            >
        </div>

        <br>

        <button type="submit" id="submitButton">
            Добавить новость
        </button>

    </form>

    <script>
        document.getElementById('articleForm').addEventListener('submit', function () {
            const button = document.getElementById('submitButton');

            button.disabled = true;
            button.textContent = 'Добавление...';
        });
    </script>

    <br>

    <a href="{{ route('articles.index') }}">Вернуться к новостям</a>

@endsection