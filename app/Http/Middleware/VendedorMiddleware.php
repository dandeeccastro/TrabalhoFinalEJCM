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
        //Caso o Vendedor esteja logado ele pode fazer alterações nos jogos//
       
        $user=Auth::user();
        $vendedor=$user->vendedor;
        $jogo = Jogos::find($request->id);

        if($jogo->vendedor_id==$vendedor->id){
            dd('passei');
            return $next($request);
        }
    
         else{
            dd('npassei');
            return response()->json(['message'=>'Acesso Negado']);
        }
    }
}
