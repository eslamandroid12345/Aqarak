<?php

namespace App\Http\Middleware;

use App\Http\traits\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AssignGuard extends BaseMiddleware
{

    use GeneralTrait;
    public function handle(Request $request, Closure $next, $guard = null)
    {

        if($guard != null){

            auth()->shouldUse($guard); //should use guard user-api or admin-api

            $token = $request->header('auth-token');
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer '. $token , true);


            try {

                $user = JWTAuth::parseToken()->authenticate();//check authenticate user


            } catch (TokenExpiredException $e) { // when user destroy token in application

                return  $this -> returnDataError('تم تسجيل الخروج برجاء اعاده التسجيل مره اخري','401');

            } catch (JWTException $e) {//غير مصرح لعمليه الدخول

                return  $this -> returnDataError(' غير مصرح له بالدخول', '404 ' . $e->getMessage());
            }

        }

        return $next($request);
    }
}
