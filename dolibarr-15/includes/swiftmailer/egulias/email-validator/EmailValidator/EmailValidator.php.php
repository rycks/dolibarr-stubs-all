<?php

namespace Egulias\EmailValidator;

class EmailValidator
{
    /**
     * @var EmailLexer
     */
    private $lexer;
    /**
     * @var array
     */
    protected $warnings;
    /**
     * @var InvalidEmail
     */
    protected $error;
    public function __construct()
    {
    }
    /**
     * @param                 $email
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
     * @return InvalidEmail
     */
    public function getError()
    {
    }
}