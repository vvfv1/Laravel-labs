
<?php

use App\Http\Controllers\MainController;
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
