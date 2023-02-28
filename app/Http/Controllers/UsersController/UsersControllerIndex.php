<?php

namespace App\Http\Controllers\UsersController;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class UsersControllerIndex
{
    public function index(Request $request)
    {
        $mensagem = FlashMessageHandler::getMessage($request);
        return view('signup.index')->with('mensagem', $mensagem);
    }
}
