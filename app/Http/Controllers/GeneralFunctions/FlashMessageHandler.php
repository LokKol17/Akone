<?php

namespace App\Http\Controllers\GeneralFunctions;

use Illuminate\Http\Request;

class FlashMessageHandler
{
    const MESSAGE = 'message';
    public static function putMessage(Request $request, string $message): bool
    {
        try {
            $request->session()->flash(self::MESSAGE, $message);
            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }

    public static function getMessage(Request $request)
    {
        return $request->session()->get(self::MESSAGE);
    }
}
