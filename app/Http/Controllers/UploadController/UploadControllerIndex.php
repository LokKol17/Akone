<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadControllerIndex extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $this->messageHandler::getMessage($request);
        return view('upload.index')->with('mensagem', $mensagem);
    }
}
