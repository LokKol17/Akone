<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GeneralFunctions\GetAnime;

class AnimeController
{
    use getAnime;
    public function index()
    {
        return 'Hello World';
    }

    public function show($id)
    {
        $anime = $this->getAnime($id);
        return $anime;
    }
}
