<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use App\Models\Anime;
use Illuminate\Http\Request;
use InvalidArgumentException;

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
        $popularSemana = [];
        for ($i = 1; $i <= 8; $i++) {
            try {
                $popularSemana[] = AnimeHandler::getAnime($i);
            } catch (InvalidArgumentException $e) {
                $popularSemana[] = new Anime(['nome' => $i, 'descricao' => 'Anime não encontrado', 'imagem_path' => 'none']);
            }
        }
        $mensagem = $this->messageHandler::getMessage($request);
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
