<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;

class Reporter
{
    public static function report(\Throwable $e): void
    {
        Log::error('Error occurred!', [
            'class' => get_class($e),
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);
    }
}
