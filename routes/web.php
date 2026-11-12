<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

// Главная страница
Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/galery/{id}', [MainController::class, 'galery']);

// Страница "О нас"
Route::get('/about', function () {
    return view('about');
})->name('about');

// Страница "Контакты"
Route::get('/contacts', function () {

    $contacts = [
        [
            'name' => 'Email',
            'value' => 'vvfv1@yandex.ru'
        ],
        [
            'name' => 'Телефон',
            'value' => '+7 (912) 326-01-28'
        ],
        [
            'name' => 'Адрес',
            'value' => 'Москва, Россия'
        ]
    ];

    return view('contacts', [
        'contacts' => $contacts
    ]);

})->name('contacts');

// Регистрация
Route::get('/signin', [AuthController::class, 'create']);
Route::post('/signin', [AuthController::class, 'registration']);

// Новости
Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');