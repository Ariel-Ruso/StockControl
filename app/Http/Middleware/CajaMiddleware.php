<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CajaMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        $inic= Caja::where('users_id', auth()->id())->get();
        foreach ($inic as $item)
            if(!$item->monto){
                abort(403, "La caja No esta iniciada");
            }
        endforeach
        dd($inic);
       /*  if ($request->user()->age <= $age) {
            
        } */
        return $next($request);
    }
}
