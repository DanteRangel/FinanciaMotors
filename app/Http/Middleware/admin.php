<?php

namespace FinanciaSystem\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class admin
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
        if(Auth::guest()){
                return redirect('login');
        }else{

            if(Auth::user()->id_permiso!=1){
                return redirect('ErrorPermisos');
            }else{
                return $next($request);    
            }
        }
    }
}
