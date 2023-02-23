<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Illuminate\Http\Request;

class LoginControllerIndex
{
    use MessageTrait;

    public function index(Request $request)
    {
        $mensagem = $this->getMessage($request);
        return view('signin.index')->with('mensagem', $mensagem);
    }
}
