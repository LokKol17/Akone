<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use App\Http\Controllers\UploadController\UploadFunctions\SanitizerUpload;
use App\Http\Controllers\UploadController\UploadFunctions\Validations;
use App\Models\Anime;
use Illuminate\Http\Request;

class UploadControllerStore
{
    public function store(Request $request)
    {
        $keepedRequest = $request;
        $request = Validations::validateInitialRequest($request);
        $request['nome'] = SanitizerUpload::sanitize($request['nome']);
        AnimeHandler::createNewAnimeDirectory($request['nome']);
        AnimeHandler::storeAnimeCover($request['nome'], $request['capa']);
        $anime = Anime::create([
            'nome' => $request['nome'],
            'sinopse' => $request['sinopse'],
            'imagem_path' => AnimeHandler::UpdateAnimeCoverPath($request['nome'], $request['capa']->hashName()),
        ]);


        FlashMessageHandler::putMessage($keepedRequest, 'Arquivo enviado com sucesso!');
        return to_route("upload.edit", $anime->id);
    }
}
