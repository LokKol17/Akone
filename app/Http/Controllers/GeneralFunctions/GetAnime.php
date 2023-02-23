<?php

namespace App\Http\Controllers\GeneralFunctions;

use App\Models\Anime;

trait GetAnime
{
    public function getAnime(int|string $id)
    {
        $anime = null;
        if (is_numeric($id)) {
            $anime = Anime::find($id)->first();
        } else {
            $anime = Anime::where('nome', $id)->first();
        }
        if ($anime == null) {
            return to_route('upload')->with('mensagem', 'Anime não encontrado!');
        }
        return $anime;
    }
}
