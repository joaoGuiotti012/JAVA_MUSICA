<?php

namespace App\Http\Middleware\Ramais;

use Closure;

class Validation
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
        if(auth()->user()->status == 'RAMAIS'){
          return $next($request);
        }
        return redirect('/home')->with('danger' , 'Falha de permissão ao acessar esta página. Contate seu administrador !');
    }
}
