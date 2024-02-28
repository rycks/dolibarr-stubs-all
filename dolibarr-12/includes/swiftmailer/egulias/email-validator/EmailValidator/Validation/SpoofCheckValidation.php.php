<?php

namespace Egulias\EmailValidator\Validation;

class SpoofCheckValidation implements \Egulias\EmailValidator\Validation\EmailValidation
{
    /**
     * @var InvalidEmail
     */
    private $error;
    public function __construct()
    {
    }
    public function isValid($email, \Egulias\EmailValidator\EmailLexer $emailLexer)
    {
    }
    public function getError()
    {
    }
    public function getWarnings()
    {
    }
}