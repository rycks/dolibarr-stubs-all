<?php

namespace Egulias\EmailValidator\Validation\Exception;

class EmptyValidationList extends \InvalidArgumentException
{
    public function __construct($code = 0, \Exception $previous = null)
    {
    }
}