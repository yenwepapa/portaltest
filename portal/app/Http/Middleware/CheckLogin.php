<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        session_start();
        if(!$_SESSION){
            $url=url('/');
            $url=str_replace('/public', '', $url);
            return redirect($url);
        }else{
            if(!$_SESSION['customer_id']){
                $url=url('/');
                $url=str_replace('/public', '', $url);
                return redirect($url);
            }
        }
        return $next($request);
    }
}
