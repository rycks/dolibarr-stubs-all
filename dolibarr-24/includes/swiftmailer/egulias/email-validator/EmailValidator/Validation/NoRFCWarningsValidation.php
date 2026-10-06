<?php

namespace Egulias\EmailValidator\Validation;

class NoRFCWarningsValidation extends \Egulias\EmailValidator\Validation\RFCValidation
{
    /**
     * @var InvalidEmail|null
     */
    private $error;
    /**
     * {@inheritdoc}
     */
    public function isValid($email, \Egulias\EmailValidator\EmailLexer $emailLexer)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getError()
    {
    }
}