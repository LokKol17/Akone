<?php

namespace App\Http\Controllers\LoginController;

class UserLoginValidator
{
    private array $input;
    private string $errorMessage;

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function validate(): bool
    {
        $validator = \Validator::make($this->input, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($validator->fails()) {
            $this->errorMessage = $validator->errors()->first();
            return false;
        }
        return true;
    }

    public function errorMessage(): string
    {
        return $this->errorMessage;
    }
}

