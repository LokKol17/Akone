<?php

namespace App\Providers;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandlerInterface;
use Illuminate\Support\ServiceProvider;

class MessageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            FlashMessageHandlerInterface::class,
            FlashMessageHandler::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
