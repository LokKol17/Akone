<?php

namespace App\Http\Controllers\UsersController;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Illuminate\Http\Request;

class UsersControllerIndex
{
    use MessageTrait;
    public function index(Request $request)
    {
        $mensagem = $this->getMessage($request);
        return view('signup.index')->with('mensagem', $mensagem);
    }
}
