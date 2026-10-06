<?php

namespace Egulias\EmailValidator\Validation\Exception;

class EmptyValidationList extends \InvalidArgumentException
{
    /**
     * @param int $code
     */
    public function __construct($code = 0, \Exception $previous = null)
    {
    }
}