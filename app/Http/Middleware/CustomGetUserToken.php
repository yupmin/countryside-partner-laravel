<?php

namespace App\Http\Middleware;


use App\Models\Mentee;
use App\Models\Mentor;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;
use Auth;

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

        $jwt = JWTAuth::parseToken()->getPayload();

        if($jwt->get('user_type') === "MENTOR" && !Mentor::find($jwt->get('id'))){

            throw new JWTException('User not found', 404);

        }elseif($jwt->get('user_type') === "MENTEE" && !Mentee::find($jwt->get('id'))){

            throw new JWTException('User not found', 404);
        }


        return $next($request);
    }
}
