<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$level)
    {
        if (in_array($request->user()->level,$level)) {
            return $next($request);
        }
        return redirect('/admin')->with('fail','Halaman ini hanya bisa diakses oleh admin.');
    }
}
