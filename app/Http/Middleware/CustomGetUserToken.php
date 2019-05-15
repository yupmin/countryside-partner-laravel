<?php

namespace App\Http\Middleware;

use App\Models\Mentor;
use Closure;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;

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
        Config::set('jwt.user', Mentor::class);
        Config::set('auth.providers.users.model', Mentor::class);


        dd(JWTAuth::getToken());


        if (! $this->auth->setRequest($request)->getToken()) {

            throw new JWTException('Token not provided', 400);
        }

        if (! $this->auth->authenticate($request)) {

            throw new JWTException('User not found', 404);
        }

        return $next($request);
    }
}
