<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isResepsionis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
                // Jika user tidak terautentikasi, redirect ke login
        if (!Auth::check()) {

            return redirect()->route('login');
        }

        // Ambil role dari session atau dari relasi user
        $userRole = session('user_role');

        // Jika user terautentikasi tapi role  1, return 403
        if ($userRole === 4) {

            return $next($request);
        } 
        return back()->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        
    }
}
