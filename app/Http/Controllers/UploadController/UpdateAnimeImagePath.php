<?php


namespace App\Http\Controllers\UploadController;

use App\Models\Anime;

trait UpdateAnimeImagePath {
    public function updateAnimeImagePath(Anime $anime, string $nome) {
        $path = $anime->imagem_path;
        $parts = explode('/', $path);
        $parts[2] = $nome->nome;
        return implode('/', $parts);
    }
}
