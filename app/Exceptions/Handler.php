<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
        //     if (! $request->expectsJson()) {
        //         return view('spatie_exception.unauthorized');
        //     };

        //     return response()->json([
        //         'responseMessage' => 'You do not have the required authorization.',
        //         'responseStatus'  => 403,
        //     ]);
        // });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof \Spatie\Permission\Exceptions\UnauthorizedException) 
        {
            if (! $request->expectsJson()) return response()->view('spatie_exception.unauthorized', [], 403);
            
            return response()->json([
                'responseMessage' => 'You do not have the required authorization.',
                'responseStatus'  => 403,
            ], 403);
        }

        return parent::render($request, $e);
    }
}