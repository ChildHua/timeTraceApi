<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class RefreshToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->checkForToken($request);

        try{
            if ($this->auth->parseToken()->authenticate()){
                return $next($request);
            }
            throw new UnauthorizedHttpException('jwt-auth','未登录');
        }catch (TokenExpiredException $exception){
            try{
                $token = $this->auth->refresh();
                Auth::guard('api')->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            }catch (JWTException $exception){
                throw new  UnauthorizedHttpException('jwt-auth',$exception->getMessage());
            }
        }

        return $this->setAuthenticationHeader($next($request),$token);
//        return $next($request);
    }
}
