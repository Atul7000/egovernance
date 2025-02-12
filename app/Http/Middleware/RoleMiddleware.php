<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['error' => 'Unauthorized access!']);
        }

        // Get authenticated user role
        $userRole = Auth::user()->role;

        // Check if the user's role matches the required role
        if ($userRole !== $role) {
            return redirect('/')->withErrors(['error' => 'Access Denied!']);
        }

        return $next($request);
    }
}
