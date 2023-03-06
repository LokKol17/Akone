<?php

namespace App\Http\Controllers\GeneralFunctions;

use Illuminate\Http\Request;

interface FlashMessageHandlerInterface
{
    public static function putMessage(Request $request, string $message): bool;
    public static function getMessage(Request $request);
}
