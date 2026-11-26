<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

// Новости — доступны всем
Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

// Операции с новостями и комментариями — только для авторизованных
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/articles/create', [ArticleController::class, 'create'])
        ->name('articles.create');

    Route::post('/articles', [ArticleController::class, 'store'])
        ->name('articles.store');

    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])
        ->name('articles.edit');

    Route::put('/articles/{article}', [ArticleController::class, 'update'])
        ->name('articles.update');

    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])
        ->name('articles.destroy');

    // Добавление комментария
    Route::post('/articles/{article}/comments', [CommentController::class, 'store'])
        ->name('comments.store');

    // Удаление комментария
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');

    // Выход из аккаунта
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

// Просмотр отдельной новости — доступен всем
Route::get('/articles/{article}', [ArticleController::class, 'show'])
    ->name('articles.show');

// Регистрация и авторизация
Route::get('/register', [AuthController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');
