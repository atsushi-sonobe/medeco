<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = $request->getUser();
        $password = $request->getPassword();

        if ($username == 'medeco' && $password == 'medeco') {
            return $next($request);
        }

        abort(401, "Enter username and password.", [
            header('WWW-Authenticate: Basic realm="Medeco Mockup"'),
            header('Content-Type: text/plain; charset=utf-8')
        ]);
    }
}
