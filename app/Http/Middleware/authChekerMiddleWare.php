<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authChekerMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        $auth  = Auth::user();
        if($auth -> role_id == 1 || $auth -> role_id == 2 || $auth -> role_id == 3 || $auth->role_id == 4){
            return $next($request);
        }

        abort(403, "Not Authrized!");

    }
}
