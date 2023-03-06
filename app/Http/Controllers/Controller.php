<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandlerInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected FlashMessageHandlerInterface $messageHandler;
    public function __construct(FlashMessageHandlerInterface $messageHandler)
    {
        $this->messageHandler = $messageHandler;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
