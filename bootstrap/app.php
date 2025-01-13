<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $url_prod = "https://emeapiproductos-production.up.railway.app/";
        $url_local = "http://localhost:8000";

        $middleware->validateCsrfTokens(except: [
            $url_prod + '/api/products/*',
            $url_prod + '/api/products'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
