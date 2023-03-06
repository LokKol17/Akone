<?php

namespace App\Http\Controllers\UploadController\UploadFunctions;

use App\Models\Anime;
use Illuminate\Http\Request;

class Validations
{
    public static function validateRequest(Request $request): array
    {
        return $request->validate([
            'nome' => 'required',
            'sinopse' => 'required',
            'capa' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public static function validateInitialRequest(Request $request): array
    {
        return $request->validate([
           'nome' => 'required',
           'sinopse' => 'required',
           'capa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
    }

    public static function getAnimeData(Anime $anime): array
    {
        return [
            'nome' => $anime->nome,
            'sinopse' => $anime->sinopse,
            'imagem_path' => $anime->imagem_path,
        ];
    }
}
