<?php

namespace Egulias\EmailValidator\Validation;

class SpoofCheckValidation implements \Egulias\EmailValidator\Validation\EmailValidation
{
    /**
     * @var InvalidEmail|null
     */
    private $error;
    public function __construct()
    {
    }
    /**
     * @psalm-suppress InvalidArgument
     */
    public function isValid($email, \Egulias\EmailValidator\EmailLexer $emailLexer)
    {
    }
    /**
     * @return InvalidEmail|null
     */
    public function getError()
    {
    }
    public function getWarnings()
    {
    }
}