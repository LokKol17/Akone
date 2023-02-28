<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;

class AnimeController
{
    public function index(): string
    {
        return 'Hello World';
    }

    public function show($id): string
    {
        return AnimeHandler::getAnime($id);
    }
}
