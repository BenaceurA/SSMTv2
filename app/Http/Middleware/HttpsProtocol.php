<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        Request::setTrustedProxies(
            [$request->getClientIp()],
            Request::HEADER_X_FORWARDED_TRAEFIK
        );

        if (!$request->secure() && App::environment() === 'production') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
