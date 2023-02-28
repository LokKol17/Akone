<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class UploadControllerIndex
{
    public function index(Request $request)
    {
        $mensagem = FlashMessageHandler::getMessage($request);
        return view('upload.index')->with('mensagem', $mensagem);
    }
}
