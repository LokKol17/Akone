<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $tags = ['Esquizofrenico', 'Romance', 'Desordenado'];
        $categorias = ['Ação', 'Comedia', 'Aventura', 'Terror', 'Romance'];
        $nomePopularHoje = 'Hittori Bocchi wa marumarusekatsu';
        $descricaoPopularHoje = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eget faucibus mauris lobortis sit amet. Nullam maximus pulvinar ultricies. Maecenas consequat et ipsum sit amet fringilla. Suspendisse suscipit dapibus dui, efficitur efficitur enim euismod eget.';
        $imagemPopularHoje = "";
        $novoEpisodioItem = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $anime = AnimeHandler::getAnime(4);
        $popularSemana = [$anime, $anime, $anime, $anime, $anime, $anime, $anime, $anime];
        $mensagem = FlashMessageHandler::getMessage($request);
        return view('homepage.index')
            ->with('imagemPopularHoje', $imagemPopularHoje)
            ->with('nomePopularHoje', $nomePopularHoje)
            ->with('descricaoPopularHoje', $descricaoPopularHoje)
            ->with('categorias', $categorias)
            ->with('tags', $tags)
            ->with('novoEpisodioItem', $novoEpisodioItem)
            ->with('popularSemana', $popularSemana)
            ->with('mensagem', $mensagem);
    }
}
