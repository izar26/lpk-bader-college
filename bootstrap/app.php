<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    // Ganti blok withExceptions yang kosong dengan ini
->withExceptions(function (Exceptions $exceptions) {
    $exceptions->renderable(function (Illuminate\Auth\AuthenticationException $e, $request) {
        if (in_array('admin', $e->guards())) {
            // PERBAIKAN DI SINI: ganti 'admin.login' menjadi 'login'
            return redirect()->guest(route('login'));
        };
    });
})->create();
