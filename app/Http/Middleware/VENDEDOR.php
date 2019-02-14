<?php

namespace App\Http\Middleware;

use Closure;
use App\Vendedor;

class VENDEDOR
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
        $vendedor=Auth::user()->Vendedor;
        $User=Auth::user();
        if(Vendedor::where('user_id','=', $user->id)->get()){
            return $next($request);
        }
    
         else{
            return['Acesso Negado'];
        }
    }
}
