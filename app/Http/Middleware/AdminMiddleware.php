<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') //admin
            {
                return $next($request);
                // return redirect('/dashboard')->with('status', 'Welcome Admin!');
            } else {
                // return redirect('/home')->with('status', 'Access denied as you are not Admin');
        return redirect()->back()->with('error', 'Access denied as you are not Admin !!');

            }
        } else {
            return redirect('/login')->with('status', 'Please login first');
        }
    }
}
