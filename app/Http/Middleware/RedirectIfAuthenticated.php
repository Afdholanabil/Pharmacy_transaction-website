<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // LOGIKA BARU: Redirect berdasarkan role
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect('/admin/dashboard');
                } elseif ($user->role === 'apoteker') {
                    return redirect('/apoteker/dashboard');
                } elseif ($user->role === 'pelanggan') {
                    return redirect('/pelanggan/dashboard');
                }

                // Fallback ke RouteServiceProvider::HOME jika role tidak cocok
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
