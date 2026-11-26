<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Старая форма регистрации из Lab 3
    public function create()
    {
        return view('auth.signin');
    }

    // Старая регистрация теперь тоже сохраняет пользователя
    public function registration(Request $request)
    {
        return $this->register($request);
    }

    // Отображение формы регистрации
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Сохранение нового пользователя
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create($validated);

        return redirect()
            ->route('login')
            ->with('success', 'Регистрация прошла успешно! Теперь войдите в аккаунт.');
    }

    // Отображение формы авторизации
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Авторизация пользователя
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Неверный email или пароль.',
                ])
                ->onlyInput('email');
        }

        // Обновляем идентификатор сессии
        $request->session()->regenerate();

        // Получаем авторизованного пользователя
        $user = Auth::user();

        // Создаём Sanctum-токен
        $user->createToken('auth-token');

        return redirect()->route('home');
    }

    // Выход пользователя
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            // Удаляем токены пользователя
            $user->tokens()->delete();
        }

        // Завершаем авторизацию
        Auth::logout();

        // Аннулируем сессию
        $request->session()->invalidate();

        // Обновляем CSRF-токен
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
