<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UploadControllerPut extends Controller
{
    public function put(Request $request, int|string $anime): RedirectResponse
    {
        $anime = AnimeHandler::getAnime($anime);
        $upload = new AnimeUploader($request, $anime);
        return $upload->upload();
    }
}
