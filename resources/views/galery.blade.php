
@extends('layouts.app')

@section('title', 'Галерея')

@section('content')

    <h1>{{ $article['name'] }}</h1>

    <p>Дата публикации: {{ $article['date'] }}</p>

    <img
        src="{{ asset($article['full_image']) }}"
        alt="{{ $article['name'] }}"
        width="600"
    >

    <p>{{ $article['desc'] }}</p>

    <a href="{{ route('home') }}">Вернуться на главную</a>

@endsection
