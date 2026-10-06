<?php

namespace Egulias\EmailValidator\Validation;

class MultipleErrors extends \Egulias\EmailValidator\Exception\InvalidEmail
{
    const CODE = 999;
    const REASON = "Accumulated errors for multiple validations";
    /**
     * @var InvalidEmail[]
     */
    private $errors = [];
    /**
     * @param InvalidEmail[] $errors
     */
    public function __construct(array $errors)
    {
    }
    /**
     * @return InvalidEmail[]
     */
    public function getErrors()
    {
    }
}