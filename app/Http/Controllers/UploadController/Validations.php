<?php

namespace App\Http\Controllers\UploadController;

trait Validations
{
    public function renameAnime($request, $anime)
    {
        if ($request->nome != $anime->nome) {
            rename('storage/animes/' . $anime->nome, 'storage/animes/' . $request->nome);
        }
    }
}
