<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/main.css') }}">
</head>
<body>
    <header class="bg-dark">
        <div class="container">
            <div class="navbar navbar-expand-lg mx-auto">
                <a class="nav-link" href="/">Главная</a>
                <a class="nav-link" href="/registration">Регистрация клиента</a>
            </div>
        </div>
    </header>
    <div class="container mt-5">
        @yield('main_content')
    </div>
    
    <script src="{{ asset('/resources/js/bootstrap.min.js') }}"></script>
    @yield('js')
</body>
</html>