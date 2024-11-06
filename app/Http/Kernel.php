<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Daftar middleware global
        \App\Http\Middleware\CheckCsAuthenticated::class,
    ];

    protected $routeMiddleware = [
        // Middleware lainnya
        'auth.cs' => \App\Http\Middleware\CheckCsAuthenticated::class,
    ];
}
