<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPinValidation
{
    public function handle(Request $request, Closure $next)
    {
        // If the user is not authenticated, redirect them to the main dashboard (PIN entry page)
        if (!Auth::check()) {
            return redirect()->route('dashboard');  // Redirect to the main dashboard route
        }

        // If the user is logged in but has not validated their PIN, redirect them to the PIN validation page
        if (!session('pin_validated')) {
            return redirect()->route('dashboard'); // Redirect to the main dashboard (PIN entry page)
        }

        return $next($request);
    }
}

