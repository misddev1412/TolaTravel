<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class HttpsProtocol
{
    public function handle(Request $request, Closure $next)
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Closure $next
         * @return mixed
         */

        $is_secure = $request->header('x-forwarded-proto') == 'https';
        $is_env = in_array(env('APP_ENV'), ['production', 'dev', 'test']);

        if (!$is_secure && $is_env) {
            return redirect()->secure($request->getRequestUri());
        }

        if ($is_env) {
            URL::forceScheme('https');
        }

        return $next($request);

    }
}