<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Illuminate\Http\Request;

class PageDontExistsController extends Controller
{
    use MessageTrait;
    public function index(Request $request)
    {
        $this->putMessage($request, 'Página não encontrada');
        $mensagem = $this->getMessage($request);
        return view('pageNotFound')
            ->with('mensagem', $mensagem);
    }
}
