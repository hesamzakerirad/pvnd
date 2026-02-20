<?php

if (!function_exists('isProfileHandle')) {
    function isProfileHandle(string $uri): bool
    {
        return $uri[0] === '@';
    }
}

if (!function_exists('getProfileHandle')) {
    function getProfileHandle(string $uri): string
    {
        return substr($uri, 1);
    }
}

if (!function_exists('ok')) {
    /**
     * Return an OK JSON response.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function ok($data = [], $message = '', $statusCode = 200): \Illuminate\Http\JsonResponse
    {
        return jsonResponse(
            type: 'success',
            data: $data,
            message: $message,
            statusCode: $statusCode
        );
    }
}

if (!function_exists('error')) {
    /**
     * Return an error JSON response.
     *
     * @param  mixed  $errors
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function error($errors = [], $message = '', $statusCode = 500): \Illuminate\Http\JsonResponse
    {
        return jsonResponse(
            type: 'error',
            errors: $errors,
            message: $message,
            statusCode: $statusCode
        );
    }
}

if (!function_exists('jsonResponse')) {
    /**
     * Return a JSON response.
     *
     * @param  string  $type
     * @param  mixed  $data
     * @param  mixed  $errors
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function jsonResponse($type, $data = [], $errors = [], $message = '', $statusCode = 200): \Illuminate\Http\JsonResponse
    {
        $isStatusCodeAmongValidHttpCodes = array_key_exists($statusCode, \Illuminate\Http\Response::$statusTexts);

        if (empty($message) && $isStatusCodeAmongValidHttpCodes) {
            $message = \Illuminate\Http\Response::$statusTexts[$statusCode];
        }

        return response()->json([
            'status' => $type,
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
        ], $isStatusCodeAmongValidHttpCodes ? $statusCode : 500);
    }
}

if (!function_exists('jdd')) {
    /**
     * JSON-friendly dd() helper for APIs.
     *
     * @link https://github.com/hesamzakerirad/laravel-api-debugger/blob/master/src/helpers.php
     *
     * @param  mixed  ...$vars
     */
    function jdd(...$vars)
    {
        $backTrace = debug_backtrace();

        $dump = [];

        foreach ($vars as $index => $var) {
            $dump[$index] = $var;
        }

        response()->json([
            'dump' => $dump,
            'trace' => [
                'file' => $backTrace[0]['file'],
                'line' => $backTrace[0]['line'],
            ],
        ], 500, [], JSON_PRETTY_PRINT)->send();

        exit(1);
    }
}
