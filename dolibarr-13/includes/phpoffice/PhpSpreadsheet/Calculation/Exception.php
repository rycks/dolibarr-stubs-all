<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

class Exception extends \PhpOffice\PhpSpreadsheet\Exception
{
    /**
     * Error handler callback.
     *
     * @param mixed $code
     * @param mixed $string
     * @param mixed $file
     * @param mixed $line
     * @param mixed $context
     */
    public static function errorHandlerCallback($code, $string, $file, $line, $context)
    {
    }
}