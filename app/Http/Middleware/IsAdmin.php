<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->user_role) {
            return $next($request);
        }


        return redirect()->route('Home')->with('error', 'شما دسترسی به این بخش ندارید.');
    }
}


