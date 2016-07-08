<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string    $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! (($request->user()->is('admin')) || $request->user()->is('root'))) {
            return redirect('index.php');
        }
        
        return $next($request);
    }
}
