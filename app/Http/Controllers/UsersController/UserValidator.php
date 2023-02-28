<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\Hash;

class UserValidator
{
    private array $input;
    private string $errorMessage = '';
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function validate(): bool
    {
        if ($this->input['password'] !== $this->input['cpassword']) {
            $this->errorMessage = 'As senhas não coincidem';
            return false;
        }
        if (strlen($this->input['password']) < 8) {
            $this->errorMessage = 'A senha deve ter no mínimo 8 caracteres';
            return false;
        }
        if (strlen($this->input['nick']) < 3) {
            $this->errorMessage = 'O nickname deve ter no mínimo 3 caracteres';
            return false;
        }
        if (!filter_var($this->input['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = 'O email informado não é válido';
            return false;
        }

        return true;
    }

    public function hash(): string
    {
        return Hash::make($this->input['password']);
    }

    public function errorMessage(): string
    {
        return $this->errorMessage;
    }
}
