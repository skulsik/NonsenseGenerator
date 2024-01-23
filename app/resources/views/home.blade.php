<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link href="../bootstrap/icons/bootstrap-icons.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body class="bg-dark">
<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <i class="bi bi-textarea-t h2"></i>extGenerator
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="ps-5"></li>
                <li><a href="{{ route('index') }}" class="nav-link px-2 text-secondary"><ya-tr-span data-index="19-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Home" data-translation="Главная" data-ch="1" data-type="trSpan">Генератор текста</ya-tr-span></a></li>
                @auth()
                    <li><a href="{{ route('list_text') }}" class="nav-link px-2 text-white"><ya-tr-span data-index="20-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Features" data-translation="Характеристики" data-ch="1" data-type="trSpan">Список-текст</ya-tr-span></a></li>
                    <li><a href="{{ route('form_create_text') }}" class="nav-link px-2 text-white"><ya-tr-span data-index="21-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Pricing" data-translation="Цены" data-ch="1" data-type="trSpan">Добавить текст</ya-tr-span></a></li>
                @endauth
            </ul>

            <div class="text-end">
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2"><ya-tr-span data-index="24-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Login" data-translation="Вход" data-ch="1" data-type="trSpan">Вход</ya-tr-span></a>
                    @endif

                    @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning"><ya-tr-span data-index="24-1" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Sign-up" data-translation="Регистрация" data-ch="1" data-type="trSpan" data-selected="false">Регистрация</ya-tr-span></a>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Выход</button>
                        </form>
                @endguest
            </div>
        </div>
    </div>
</header>

<div class="bg-light">

    @hasSection('content')
        @yield('content')
    @else
        <div class="container p-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 border border-dark rounded p-4">
                    <h3><i class="bi bi-card-text h3"></i><span class="ps-3">Генерация текста</span></h3>
                    <hr>
                    <form method="POST" action="{{ route('generation_text') }}" class="form-control p-3">
                        @csrf

                        @if($errors->any())
                            <div>
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group row mb-3">
                            <label for="num_sentences" class="col-sm-10 col-form-label">Введите количество предложений, из которых будет сгенерирован текст</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="num_sentences" name="num_sentences" value="5" min="2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-warning">Генерация текста</button>
                            </div>
                        </div>
                    </form>
                    @if(!empty($count_text))
                        @if($count_text < 2)
                            <br>
                            <div>
                                <div class="alert alert-dark p-3">Для генерации кастомного текста, необходимо создать от двух текстов-доноров! У вас пока {{ $count_text }}.</div>
                            </div>
                        @endif
                    @endif

                    @if(!empty($text))
                        <div>
                            <h5 class="p-3">Сгенерированный текст</h5>
                            <div class="alert alert-light border">
                                {{ $text }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

</div>


<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-5 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-secondary">© 2024 TextGenerator, Inc. Все права защищены.</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-secondary" href="https://t.me/skulsik"><i class="bi bi-telegram h2"></i></a></li>
            <li class="ms-3"><a class="text-secondary" href="https://github.com/skulsik"><i class="bi bi-github h2"></i></a></li>
            <li class="ms-3"><i class="bi bi-phone h2 text-secondary" title="8(952)-895-87-58"></i></li>
        </ul>
    </footer>
</div>

<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
