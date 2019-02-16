<?php

namespace App\Http\Middleware;

use Closure;
use App\Vendedor;
use App\User;

class VendedorMiddleware
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
        //Caso o Vendedor esteja logado ele pode fazer alterações nos jogos//
        $user=Auth::user();
        $vendedor=Auth::user()->Vendedor;
        dd ("entreinamiddleware");
        dd (Vendedor::where('user_id','=', $user->id)->first());

        if(Vendedor::where('user_id','=', $user->id)->first()){
            return $next($request);
        }
    
         else{
            return['Acesso Negado'];
        }
    }
}
