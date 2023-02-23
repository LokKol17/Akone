<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers\UsersController;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersControllerStore
{
    use MessageTrait;
    public function store(Request $request): RedirectResponse
    {
        $input = $request->except('_token');

        $validator = new UserValidator($input);
        if (!$validator->validate()) {
            $this->putMessage($request, $validator->errorMessage());
            return back();
        }

        $user = User::create([
            'nick' => $input['nick'],
            'email' => $input['email'],
            'password_hash' => $validator->hash(),
        ]);
        Auth::login($user);
        $this->putMessage($request, 'Conta criada com sucesso!');
        return to_route('homepage');
    }
}
