<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class LoginControllerIndex extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $this->messageHandler::getMessage($request);
        return view('signin.index')->with('mensagem', $mensagem);
    }
}
