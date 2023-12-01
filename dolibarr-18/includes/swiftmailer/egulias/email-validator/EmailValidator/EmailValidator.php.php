<?php

namespace Egulias\EmailValidator;

class EmailValidator
{
    /**
     * @var EmailLexer
     */
    private $lexer;
    /**
     * @var Warning\Warning[]
     */
    protected $warnings = [];
    /**
     * @var InvalidEmail|null
     */
    protected $error;
    public function __construct()
    {
    }
    /**
     * @param string          $email
     * @param EmailValidation $emailValidation
     * @return bool
     */
    public function isValid($email, \Egulias\EmailValidator\Validation\EmailValidation $emailValidation)
    {
    }
    /**
     * @return boolean
     */
    public function hasWarnings()
    {
    }
    /**
     * @return array
     */
    public function getWarnings()
    {
    }
    /**
     * @return InvalidEmail|null
     */
    public function getError()
    {
    }
}