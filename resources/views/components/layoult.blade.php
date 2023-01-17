<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('./css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/cabecalho/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/rodape/style.css') }}">
    @isset($css)
    {{ $css }}
    @endisset
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho__mega-container">
            <h1 class="cabecalho__titulo"><a href="{{ route('homepage') }}">Akone</a></h1>
            <div class="cabecalho__container">
                <div class="cabecalho__pesquisa">
                    <label for="input-pesquisa"></label><input type="text" class="cabecalho__pesquisa__input" name="inputPesquisa" id="input-pesquisa" placeholder="Insira o nome do anime">
                    <button type="submit" class="cabecalho__pesquisa__button">
                        <img class="cabecalho__pesquisa__button--img" src="{{ asset('./assets/cabecalho/pesquisar2.svg') }}" alt="">
                    </button>
                </div>
            </div>
            <nav class="menu__hamburger">
                <div class="menu__hamburger--wrapper" id="menuHamburgerWrapper">
                    <div class="hamburguer-1 hamburguer" id="hamburguer1"></div>
                    <div class="hamburguer-2 hamburguer" id="hamburguer2"></div>
                    <div class="hamburguer-3 hamburguer" id="hamburguer3"></div>
                </div>
            </nav>
        </div>

        <div class="menu">
            <div class="menu__lista">
                <p class="menu__lista__item"><a href="{{ route('homepage') }}">Home</a></p>
                <div class="menu__container"><div class="menu__linha__tl"></div><div class="menu__linha"></div><div class="menu__linha__tr"></div></div>
                <p class="menu__lista__item">Lista de Animes</p>
                <div class="menu__container"><div class="menu__linha__tl"></div><div class="menu__linha"></div><div class="menu__linha__tr"></div></div>
                <p class="menu__lista__item">Novos Lançamentos</p>
                <div class="menu__container"><div class="menu__linha__tl"></div><div class="menu__linha"></div><div class="menu__linha__tr"></div></div>
            </div>

            <div class="cabecalho__pesquisa--mobile">
                <label for="input-pesquisa-mobile"></label><input type="text" class="cabecalho__pesquisa__input--mobile" name="inputPesquisa" id="input-pesquisa-mobile" placeholder="Insira o nome do anime">
                <button type="submit" class="cabecalho__pesquisa__button--mobile">
                    <img class="cabecalho__pesquisa__button--img--mobile" src="{{ asset('./assets/cabecalho/pesquisar2.svg') }}" alt="Icon Lupa">
                </button>
            </div>

            <div class="menu__cliente">
                <button class="menu__button__registro">Registrar</button>
                <button class="menu__button__login">Log In</button>
            </div>
        </div>
    </header>

    {{ $slot }}


    <footer class="rodape">
        <h2 class="rodape__titulo">Akone</h2>
        <div class="rodape__container">
            <ul class="rodape__lista">
                <li class="rodape__lista__item">Faq</li>
                <li class="rodape__lista__item">Lista de animes</li>
            </ul>

        <p class="rodape__discord">Juste-se à nossa Comunidade no <a href="#">Discord</a></p>
        </div>
    </footer>


    <script src="{{ asset('./assets/cabecalho/menuHamburger.js') }}"></script>
    @isset($scripts)
    {{ $scripts }}
    @endisset
</body>
</html>
