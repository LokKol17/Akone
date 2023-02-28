<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class UploadControllerEdit
{
    public function edit(Request $request, int|string $id)
    {
        try {
            $anime = AnimeHandler::getAnime($id);
        } catch (\InvalidArgumentException $e) {
            FlashMessageHandler::putMessage($request,'Anime não encontrado');
            return to_route('homepage');
        }
        return view('upload.index')->with('anime', $anime)
            ->with('mensagem', FlashMessageHandler::getMessage($request));
    }
}
