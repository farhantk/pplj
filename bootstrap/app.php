<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AssistantMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'assistant'=>AssistantMiddleware::Class,
            'guest'=>GuestMiddleware::Class,
            'admin'=>AdminMiddleware::Class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
