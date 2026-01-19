<?php

namespace Egulias\EmailValidator\Validation;

class DNSCheckValidation implements \Egulias\EmailValidator\Validation\EmailValidation
{
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
    protected function checkDNS($host)
    {
    }
}