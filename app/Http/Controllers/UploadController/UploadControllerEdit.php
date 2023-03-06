<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use Illuminate\Http\Request;

class UploadControllerEdit extends Controller
{
    public function edit(Request $request, int|string $id)
    {
        try {
            $anime = AnimeHandler::getAnime($id);
        } catch (\InvalidArgumentException $e) {
            $this->messageHandler::putMessage($request,'Anime não encontrado');
            return to_route('homepage');
        }
        return view('upload.index')->with('anime', $anime)
            ->with('mensagem', $this->messageHandler::getMessage($request));
    }
}
