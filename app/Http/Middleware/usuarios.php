<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class usuarios
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
        if (auth()->user()->tipo_usuario == "1") {
            return $next($request);
        } else {
            return redirect('/compraventa_administrar');
        }
    }
}