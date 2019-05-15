<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class CustomGetUserToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws JWTException
     */
    public function handle($request, Closure $next)
    {
        if (! $this->auth->setRequest($request)->getToken()) {

            throw new JWTException('Token not provided', 400);
        }

        if (! $this->auth->authenticate($request)) {

            throw new JWTException('User not found', 404);
        }

        return $next($request);
    }
}
