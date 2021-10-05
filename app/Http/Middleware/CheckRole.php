<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*provjera role i da li ima pravo pristupa */
class CheckRole{

    public function handle ($request, Closure $next, $role){
        $user = Auth::user();
        if ($user->hasRole($role)){
            return $next($request);
        }
        abort (403, "You don't have enough rights to access this site.");
    }
}

?>