<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        
        if ($role == 'admin' && $user->id_jenis_anggota != 1) {
            return redirect('/'); // Arahkan ke halaman lain jika bukan admin
        }

        if ($role == 'siswa' && $user->id_jenis_anggota != 2) {
            return redirect('/'); // Arahkan ke halaman lain jika bukan siswa
        }

        return $next($request);
    }
}
