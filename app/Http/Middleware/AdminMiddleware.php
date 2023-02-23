<?php

namespace App\Http\Middleware;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    use MessageTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::check() === false || \Auth::user()['id'] !== 1) {
            return to_route('homepage')
                ->with($this->putMessage($request, 'Somente admins podem acessar isto'));
        }
        return $next($request);
    }
}
