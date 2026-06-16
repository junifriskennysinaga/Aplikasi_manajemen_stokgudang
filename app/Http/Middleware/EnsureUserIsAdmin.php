<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->isAdminGudang()) {
            return $next($request);
        }

        abort(403, 'Akses Ditolak. Halaman ini khusus Admin Gudang.');
    }
}