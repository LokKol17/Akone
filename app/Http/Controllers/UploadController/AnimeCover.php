<?php

namespace App\Http\Controllers\UploadController;

trait AnimeCover
{
    public function storeAnimeCover(string $animeName, $file): void
    {
        \Storage::put('public/animes/' . $animeName, $file);
    }

    public function updateAnimeCover(string $animeName, $fileHashName): string
    {
        return 'public/animes/' . $animeName . '/' . $fileHashName;
    }

}
