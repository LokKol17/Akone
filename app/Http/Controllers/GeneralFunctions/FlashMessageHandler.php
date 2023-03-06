<?php

namespace App\Http\Controllers\GeneralFunctions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FlashMessageHandler implements FlashMessageHandlerInterface
{
    const MESSAGE_TYPE = 'message';
    public static function putMessage(Request $request, string $message): bool
    {
        try {
            $request->session()->flash(self::MESSAGE_TYPE, $message);
            return true;
        } catch (\Throwable $exception) {
            Log::log('error', $exception->getMessage());
            return false;
        }
    }

    public static function getMessage(Request $request)
    {
        return $request->session()->get(self::MESSAGE_TYPE);
    }
}
