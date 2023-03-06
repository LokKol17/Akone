<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageDontExistsController extends Controller
{
    public function index(Request $request)
    {
        $this->messageHandler::putMessage($request, 'Página não encontrada');
        $mensagem = $this->messageHandler::getMessage($request);
        return view('pageNotFound')
            ->with('mensagem', $mensagem);
    }
}
