<?php

namespace Egulias\EmailValidator\Validation;

class MultipleValidationWithAnd implements \Egulias\EmailValidator\Validation\EmailValidation
{
    /**
     * If one of validations gets failure skips all succeeding validation.
     * This means MultipleErrors will only contain a single error which first found.
     */
    const STOP_ON_ERROR = 0;
    /**
     * All of validations will be invoked even if one of them got failure.
     * So MultipleErrors will contain all causes.
     */
    const ALLOW_ALL_ERRORS = 1;
    /**
     * @var EmailValidation[]
     */
    private $validations = [];
    /**
     * @var array
     */
    private $warnings = [];
    /**
     * @var MultipleErrors
     */
    private $error;
    /**
     * @var bool
     */
    private $mode;
    /**
     * @param EmailValidation[] $validations The validations.
     * @param int               $mode        The validation mode (one of the constants).
     */
    public function __construct(array $validations, $mode = self::ALLOW_ALL_ERRORS)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isValid($email, \Egulias\EmailValidator\EmailLexer $emailLexer)
    {
    }
    private function addNewError($possibleError, array $errors)
    {
    }
    private function shouldStop($result)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getError()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getWarnings()
    {
    }
}