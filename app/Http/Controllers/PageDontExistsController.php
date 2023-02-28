<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class PageDontExistsController extends Controller
{
    public function index(Request $request)
    {
        FlashMessageHandler::putMessage($request, 'Página não encontrada');
        $mensagem = FlashMessageHandler::getMessage($request);
        return view('pageNotFound')
            ->with('mensagem', $mensagem);
    }
}
