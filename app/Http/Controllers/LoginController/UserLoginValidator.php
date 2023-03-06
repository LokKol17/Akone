<?php

namespace App\Http\Controllers\LoginController;

class UserLoginValidator
{
    private array $input;
    private string $errorMessage = '';

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function validate(): bool
    {
        if (!$this->validateEmail() || empty($this->input['email'])) {
            $this->errorMessage = 'Email inválido';
            return false;
        }

        if ($this->passwordIsEmpty()) {
            $this->errorMessage = 'Senha inválida';
            return false;
        }

        return true;
    }

    private function validateEmail(): bool
    {
        return filter_var($this->input['email'], FILTER_VALIDATE_EMAIL);
    }

    public function errorMessage(): string
    {
        return $this->errorMessage;
    }

    private function passwordIsEmpty(): bool
    {
        return empty($this->input['password']);
    }
}

