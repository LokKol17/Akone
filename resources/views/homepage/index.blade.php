<x-layoult title="Homepage - Akone" :mensagem="$mensagem">
<x-slot name="css">
    <link rel="stylesheet" href="{{ asset('./homepage/style.css') }}">
</x-slot>

<main class="principal">
    <section class="popular-hoje">
        <h2 class="popular-hoje__titulo">Popular Hoje</h2>

        <div class="popular-hoje__container">
            <div class="popular-hoje__img">
                <img src="{{ $imagemPopularHoje }}" alt="" class="popular-hoje--img">
                <h3 class="popular-hoje__info__titulo--mobile">{{ $nomePopularHoje }}</h3>
            </div>
            <div class="popular-hoje__info">
                <h3 class="popular-hoje__info__titulo">{{ $nomePopularHoje }}</h3>
                <p class="popular-hoje__info__desc">{{ $descricaoPopularHoje }}</p>
                <div class="popular-hoje__info__tags">
                    @foreach($tags as $tag)
                    <div class="popular-hoje__info__tag">{{ $tag }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="divisoria"></div>
    <section class="categorias">
        <div class="categorias__header">
            <h2 class="categorias__titulo">Categorias</h2>
            <a href="#" class="categorias__botao-tudo">Ver Tudo</a>
        </div>
        <div class="categorias__mega-container">
            <div class="categorias__container">
                @foreach($categorias as $categoria)
                <div class="categoria">
                    <div class="categoria__icone"><img src="#" alt="" class="categoria__icone--img"></div>
                    <h3 class="categoria__titulo">{{ $categoria }}</h3>
                </div>
                @endforeach
                <div class="categooria">Mais Categorias em breve...</div>
            </div>
            <div class="categorias__botao--esq" id="btnEsq">&lt;</div>
            <div class="categorias__botao--dir" id="btnDir">&gt;</div>
        </div>
    </section>
    <div class="divisoria"></div>
    <section class="novos-episodios">
        <h2 class="novos-episodios__titulo">Novos Episódios</h2>
        <div class="novos-episodios__container">
            @foreach($novoEpisodioItem as $index => $name)
                <div class="novos-episodios__item @if(($index + 1) > 6) novos-episodios__item--ocultar @endif">
                    <img class="novos-episodios__img" src="#" alt="{{ $index }}">
                    <p class="novos-episodios__nome">{{ $name }}</p>
                </div>
            @endforeach
        </div>
    </section>
    <div class="divisoria"></div>
    <section class="popular-semana">
        <h2 class="popular-semana__titulo">Populares da Semana</h2>
        <div class="popular-semana__container">
            @foreach($popularSemana as $index => $anime)
                <div class="popular-semana__item @if(($index + 1) > 4) popular-semana__item--ocultar @endif" >
                    <img src="{{ asset($anime->imagem_path) }}" alt="{{ $anime->nome}}">
                    @if(($index + 1) < 4)
                        <div class="popular-semana__item--top">{{ $index + 1}}</div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</main>


<x-slot name="scripts">
    <script src="{{ asset('./homepage/js/anime-master/lib/anime.min.js') }}"></script>
    <script src="{{ asset('./homepage/js/categorias/categorias.js') }}"></script>
</x-slot>
</x-layoult>
