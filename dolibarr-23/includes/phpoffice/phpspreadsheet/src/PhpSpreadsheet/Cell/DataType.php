<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class DataType
{
    // Data types
    const TYPE_STRING2 = 'str';
    const TYPE_STRING = 's';
    const TYPE_FORMULA = 'f';
    const TYPE_NUMERIC = 'n';
    const TYPE_BOOL = 'b';
    const TYPE_NULL = 'null';
    const TYPE_INLINE = 'inlineStr';
    const TYPE_ERROR = 'e';
    /**
     * List of error codes.
     *
     * @var array
     */
    private static $errorCodes = ['#NULL!' => 0, '#DIV/0!' => 1, '#VALUE!' => 2, '#REF!' => 3, '#NAME?' => 4, '#NUM!' => 5, '#N/A' => 6];
    /**
     * Get list of error codes.
     *
     * @return array
     */
    public static function getErrorCodes()
    {
    }
    /**
     * Check a string that it satisfies Excel requirements.
     *
     * @param null|RichText|string $pValue Value to sanitize to an Excel string
     *
     * @return null|RichText|string Sanitized value
     */
    public static function checkString($pValue)
    {
    }
    /**
     * Check a value that it is a valid error code.
     *
     * @param mixed $pValue Value to sanitize to an Excel error code
     *
     * @return string Sanitized value
     */
    public static function checkErrorCode($pValue)
    {
    }
}