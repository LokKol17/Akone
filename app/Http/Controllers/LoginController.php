<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        return view('signin.index')->with('mensagem', $mensagem);
    }

    public function store(Request $request)
    {
        $dados = $request->only(['email', 'password']);
        $email = $dados['email'];
        $password_hash = $dados['password'];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (!Auth::attempt($credentials)) {
            $request->session()->flash('mensagem', 'Email ou senha invalidos');
            return to_route('signin');
        }
        return to_route('homepage');
    }

    public function destroy()
    {
        Auth::logout();
        return to_route('homepage');
    }
}
