<?php

namespace App\Http\Controllers\AccountController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Auth;
use Illuminate\Http\Request;

class AccountControllerIndex extends Controller
{
    use MessageTrait;
    public function index(Request $request)
    {
        if (!Auth::check()) {
            $this->putMessage($request, "Crie uma conta para acessar o painel");
            return to_route('homepage');
        }

        $mensagem = $this->getMessage($request);
        return view('account.index')
            ->with('nick', Auth::user()['nick'])
            ->with('mensagem', $mensagem);
    }
}
