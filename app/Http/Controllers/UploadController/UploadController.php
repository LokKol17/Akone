<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\GetAnime;
use App\Http\Controllers\GeneralFunctions\MessageTrait;
use App\Models\Anime;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class UploadController extends Controller
{
    use MessageTrait;
    use SanitizerUpload;
    use UpdateAnimeImagePath;
    use AnimeCover;
    use Validations;
    use GetAnime;

    public function index(Request $request)
    {
        $mensagem = $this->getMessage($request);
        return view('upload.index')->with('mensagem', $mensagem);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'capa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request->nome = $this->sanitize($request->nome);
        \Storage::makeDirectory('public/animes/' . $request->nome);
        \Storage::put('public/animes/' . $request->nome, $request->file('capa'));
        Anime::create([
            'nome' => $request->nome,
            'sinopse' => $request->sinopse,
            'imagem_path' => 'storage/animes/' . $request->nome . '/' . $request->file('capa')->hashName()
        ]);


        return to_route('upload')->with('mensagem', 'Arquivo enviado com sucesso!');
    }

    public function edit(int|string $id)
    {
        $anime = $this->getAnime($id);
        return view('upload.edit')->with('anime', $anime);
    }

    public function put(Request $request, int|string $anime)
    {
        $request->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'capa' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        /** @var Anime $anime */
        $anime = $this->getAnime($anime);

        $anime->nome = $this->sanitize($anime->nome);
        $request->nome = $this->sanitize($request->nome);

        $this->renameAnime($request, $anime);

        if (!isNull($request->file('capa'))) {
            $this->storeAnimeCover($request->nome, $request->file('capa'));
            $anime->imagem_path = $this->updateAnimeCover($request->nome, $request->file('capa')->hashName());
        } else {
            $anime->imagem_path = $this->updateAnimeImagePath($anime, $request->nome);
        }

        $anime->fill($request->all());
        $anime->save();

        return to_route('upload')->with('mensagem', 'Arquivo editado com sucesso!');
    }
}
