
@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <h1>Статьи Lorem Ipsum</h1>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Название</th>
                <th>Изображение</th>
                <th>Краткое описание</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($articles as $id => $article)
                <tr>
                    <td>{{ $article['date'] }}</td>

                    <td>{{ $article['name'] }}</td>

                    <td>
                        <a href="{{ url('/galery/' . $id) }}">
                            <img
                                src="{{ asset($article['preview_image']) }}"
                                alt="{{ $article['name'] }}"
                                width="150"
                            >
                        </a>
                    </td>

                    <td>{{ $article['shortDesc'] ?? $article['desc'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
