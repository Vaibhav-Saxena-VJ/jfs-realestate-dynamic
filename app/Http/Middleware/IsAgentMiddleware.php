<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Get the role_id from the session
       $role_id = session()->get('role_id');
       // Allow access if the role_id is 2 (agent) or 4 (admin)
       if ($role_id == 2 || $role_id == 4) {
           return $next($request);
       }
       
       // Redirect if not authorized
       return redirect('/')->with('error', 'You are not the authorized user to access this page');
    }
}
