<?php

namespace App\Http\Controllers\AccountController;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AccountControllerIndex extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            $this->messageHandler::putMessage($request, "Crie uma conta para acessar o painel");
            return to_route('homepage');
        }

        $mensagem = $this->messageHandler::getMessage($request);
        return view('account.index')
            ->with('nick', Auth::user()['nick'])
            ->with('mensagem', $mensagem);
    }
}
