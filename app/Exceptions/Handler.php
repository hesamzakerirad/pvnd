<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as LaravelExceptionHandler;
use Throwable;

class Handler extends LaravelExceptionHandler
{
    /**
     * Report or log an exception.
     *
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $e)
    {
        \App\Exceptions\Reporter::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            $errors = config('app.debug') ? $exception->getTrace() : [];

            return error(
                message: $exception->getMessage(),
                errors: $errors,
                statusCode: $exception->getCode()
            );
        }

        return parent::render($request, $exception);
    }
}
