<?php

namespace App\Http\Controllers\AccountController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Auth;
use Illuminate\Http\Request;

class AccountControllerIndex extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            FlashMessageHandler::putMessage($request, "Crie uma conta para acessar o painel");
            return to_route('homepage');
        }

        $mensagem = FlashMessageHandler::getMessage($request);
        return view('account.index')
            ->with('nick', Auth::user()['nick'])
            ->with('mensagem', $mensagem);
    }
}
