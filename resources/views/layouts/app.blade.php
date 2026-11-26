<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #26364a;
            padding: 20px 50px;
            color: white;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        nav h2 {
            font-size: 24px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-size: 16px;
        }

        nav a:hover {
            color: #79b8ff;
        }

        nav form {
            display: inline;
            margin-left: 25px;
        }

        nav button {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        nav button:hover {
            color: #79b8ff;
        }

        main {
            flex: 1;
            max-width: 1000px;
            width: 90%;
            margin: 50px auto;
            padding: 35px;
            background-color: white;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 25px;
            color: #26364a;
        }

        p {
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        footer {
            background-color: #26364a;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer p {
            margin: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <h2>Фаизова веб</h2>

            <div>
                <a href="{{ route('home') }}">Главная</a>
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('contacts') }}">Контакты</a>

                @auth
                    <span>Привет, {{ Auth::user()->name }}!</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Войти</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>ФИО: Фаизова Виктория Денисовна</p>
        <p>Группа: 251-321</p>
    </footer>

</body>
</html>
