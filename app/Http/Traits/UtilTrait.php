<?php

namespace App\Http\Traits;
use Exception;

trait UtilTrait
{
    /**
     * Generating Array For Logging
     * @param Exception $exception
     * @return array
     */
    public function getLogArray(Exception $exception)
    {
        return [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'message' => $exception->getMessage()
        ];
    }
}
