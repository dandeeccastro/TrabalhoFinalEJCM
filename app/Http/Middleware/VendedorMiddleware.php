<?php

namespace App\Http\Middleware;

use Closure;
use App\Vendedor;
use App\User;
use Auth;

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
        dd("entrei");

        //Caso o Vendedor esteja logado ele pode fazer alterações nos jogos//
        $user=Auth::user();
        

        $vendedor=Auth::user()->vendedor;

        if(vendedor::where('user_id' , '=' , $user->id)->first()){
            return $next($request);
        }
    
         else{
            return response()->json(['message'=>'Acesso Negado']);
        }
    }
}
