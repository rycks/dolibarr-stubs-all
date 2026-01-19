<?php

namespace Egulias\EmailValidator\Validation;

class RFCValidation implements \Egulias\EmailValidator\Validation\EmailValidation
{
    /**
     * @var EmailParser
     */
    private $parser;
    /**
     * @var array
     */
    private $warnings = [];
    /**
     * @var InvalidEmail
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