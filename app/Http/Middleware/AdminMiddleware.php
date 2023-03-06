<?php

namespace App\Http\Middleware;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandlerInterface;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminMiddleware
{

    private FlashMessageHandlerInterface $messageHandler;
    public function __construct(FlashMessageHandlerInterface $messageHandler)
    {
        $this->messageHandler = $messageHandler;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::check() === false || \Auth::user()['id'] !== 1) {
            return to_route('homepage')
                ->with($this->messageHandler::putMessage($request, 'Somente admins podem acessar isto'));
        }
        return $next($request);
    }
}
