<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            // If the user is not logged in or does not have the 'user' role,
            // redirect them to the login page
            return redirect('login');
        }

        return $next($request);
    }
}
