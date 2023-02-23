<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerDestroy
{
    use MessageTrait;
    public function destroy(Request $request)
    {
        Auth::logout();
        $this->putMessage($request, 'Deslogado com sucesso');
        return to_route('homepage');
    }
}
