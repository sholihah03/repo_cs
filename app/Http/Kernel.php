<?php

namespace App\Http;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Daftar middleware global
        \App\Http\Middleware\CheckDirekturAuthenticatedMiddleware::class,
        \App\Http\Middleware\CheckKaryawanAuthenticatedMiddleware::class,
        \App\Http\Middleware\CheckCsAuthenticated::class,
        \App\Http\Middleware\CheckManagerAuthenticated::class,
        \App\Http\Middleware\CheckAdvertiserAuthenticatedMiddleware::class,
    ];

    protected $routeMiddleware = [
        // Middleware lainnya
        'auth.direktur' => \App\Http\Middleware\CheckDirekturAuthenticatedMiddleware::class,
        'auth.manager' => \App\Http\Middleware\CheckManagerAuthenticated::class,
        'auth.karyawan' => \App\Http\Middleware\CheckKaryawanAuthenticatedMiddleware::class,
        'auth.cs' => \App\Http\Middleware\CheckCsAuthenticated::class,
        'auth.advertiser' => \App\Http\Middleware\CheckAdvertiserAuthenticatedMiddleware::class,
    ];

    protected function schedule(Schedule $schedule)
{
    // Menjadwalkan command untuk dijalankan setiap hari
    $schedule->command('notifications:clean-expired')->daily();
}
}
