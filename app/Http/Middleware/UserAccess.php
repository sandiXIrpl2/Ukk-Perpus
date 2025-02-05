<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $userType
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if ($userType == 'admin' && auth()->user()->type == 1) {
            return $next($request);
        } elseif ($userType == 'user' && auth()->user()->type == 0) {
            return $next($request);
        }
        
        // Redirect berdasarkan tipe user
        if (auth()->user()->type == 1) {
            return redirect()->route('admin.home')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }
        
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}
