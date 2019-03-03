<?php

namespace App\Http\Middleware;

use Closure;

class APIautenticazione
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
        //dd($request->header('authorization'));
        //controllo se è stato inserito il valore per authorization
        if(empty($request->header('Authorization'))){

          return response()->json([
            'errore' => 'autorizzazione mancante'
          ]);

        }
        //recupero la chiave dal env
        $chiaveAPI = config('app.api_chiave');
        //controllo se è stato inserito il valore per authorization inserito sia giusto
        if($request->header('Authorization') != $chiaveAPI){

          return response()->json([
            'errore' => 'chiave inserita sbagliata!'
          ]);

        }
        return $next($request);
    }
}
