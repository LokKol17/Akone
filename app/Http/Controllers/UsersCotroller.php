<?php

namespace App\Http\Controllers;


use App\Http\Requests\SignupFormRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UsersCotroller extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        return view('signup.index')->with('mensagem', $mensagem);
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        if ($input['password'] !== $input['cpassword']) {
            $request->session()->flash('mensagem', 'O Email ou a senha não coincidem com as regras');
            return to_route('signup');
        }

        $hash = Hash::make($input['password']);

        $user = User::create([
            'nick' => $input['nick'],
            'email' => $input['email'],
            'password_hash' => $hash,
        ]);
        Auth::login($user);
        $request->session()->flash('mensagem', 'Conta criada com sucesso!');
        return to_route('homepage');
    }

}
