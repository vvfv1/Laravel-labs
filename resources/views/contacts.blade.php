
@extends('layouts.app')

@section('title', 'Контакты')

@section('content')

    <h1>Контакты</h1>

    <p>Связаться с нами можно следующими способами:</p>

    @foreach ($contacts as $contact)

        <p>
            <strong>{{ $contact['name'] }}:</strong>
            {{ $contact['value'] }}
        </p>

    @endforeach

@endsection
