<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsManajer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->isManajer()) {
            return $next($request);
        }

        abort(403, 'Akses Ditolak. Halaman ini khusus Manajer.');
    }
}