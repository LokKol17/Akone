<?php

namespace App\Http\Controllers\UsersController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersControllerIndex extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $this->messageHandler::getMessage($request);
        return view('signup.index')->with('mensagem', $mensagem);
    }
}
