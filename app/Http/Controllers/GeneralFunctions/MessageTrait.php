<?php

namespace App\Http\Controllers\GeneralFunctions;

use Illuminate\Http\Request;

trait MessageTrait
{
    public function putMessage(Request $request ,string $message): bool
    {
        try {
            $request->session()->flash('mensagem', $message);
            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }

    public function getMessage(Request $request)
    {
        return $request->session()->get('mensagem');
    }
}
