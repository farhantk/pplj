<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AssistantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // User is authenticated
            if (Auth::user()->role == 'assistant') {
                return $next($request);
            }
    
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('signin');
        }
    }
}
