<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class USUARIO
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
        //Caso o usuario esteja logado ele pode fazer alterações na sua conta// 

        if($user=Auth::user()){ 
            return $next($request);
        }

        else{
            return['Acesso Negado'];
        }
        
    }
}
