<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isPemilik
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user tidak terautentikasi, redirect ke login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil role dari session
        $userRole = session('user_role');

        // User tanpa role khusus (bukan 1,2,3,4) dianggap sebagai pemilik
        if (empty($userRole) || !in_array($userRole, [1, 2, 3, 4])) {
            return $next($request);
        } else {
            return back()->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }
}