<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}

// namespace App\Exceptions;

// use Exception;
// use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class Handler extends ExceptionHandler
// {
//     public function render($request, \Throwable $exception)
//     {
//         // Custom exception handling logic
//         if ($exception instanceof CustomException) {
//             return response()->view('errors.custom', [], 500);
//         }

//         // Handle specific exceptions differently
//         if ($exception instanceof ModelNotFoundException) {
//             return response()->view('errors.404', [], 404);
//         }

//         // Default exception handling
//         return parent::render($request, $exception);
//     }
// }
