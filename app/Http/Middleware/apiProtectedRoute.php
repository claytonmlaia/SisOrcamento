<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class apiProtectedRoute extends BaseMiddleware
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
//        try{
//            $user = JWTAuth::porseToken()->authenticate();
//        }catch (\Exception $e){
//            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
//                return response()->json(['status' => 'Token is invalid']);
//            }elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
//                return response()->json(['status' => 'Token is expired']);
//            }else{
//                return response()->json(['status' => 'Authorization token not found']);
//            }
//        }
        return $next($request);
    }
}
