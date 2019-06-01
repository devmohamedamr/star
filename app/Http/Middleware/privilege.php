<?php

namespace App\Http\Middleware;

use Closure;

class privilege
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
        if($request->privilege == 'SuperAdmin'){
            return $next($request);
        }
        
        return redirect('category');

    }
}
