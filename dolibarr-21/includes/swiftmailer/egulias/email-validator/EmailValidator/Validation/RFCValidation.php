<?php

namespace Egulias\EmailValidator\Validation;

class RFCValidation implements \Egulias\EmailValidator\Validation\EmailValidation
{
    /**
     * @var EmailParser|null
     */
    private $parser;
    /**
     * @var array
     */
    private $warnings = [];
    /**
     * @var InvalidEmail|null
     */
    private $error;
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