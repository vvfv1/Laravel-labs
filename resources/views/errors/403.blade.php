@extends('layouts.app')

@section('title', 'Доступ запрещён')

@section('content')
    <div style="text-align: center; padding: 50px 20px;">
        <h1>403</h1>

        <h2>Доступ запрещён</h2>

        <p>
            {{ $message ?? 'У вас нет прав для выполнения этого действия.' }}
        </p>

        <a href="{{ route('home') }}">
            Вернуться на главную
        </a>
    </div>
@endsection
