<?php

namespace Egulias\EmailValidator\Parser;

abstract class Parser
{
    /**
     * @var array
     */
    protected $warnings = [];
    /**
     * @var EmailLexer
     */
    protected $lexer;
    /**
     * @var int
     */
    protected $openedParenthesis = 0;
    public function __construct(\Egulias\EmailValidator\EmailLexer $lexer)
    {
    }
    /**
     * @return \Egulias\EmailValidator\Warning\Warning[]
     */
    public function getWarnings()
    {
    }
    /**
     * @param string $str
     */
    public abstract function parse($str);
    /** @return int */
    public function getOpenedParenthesis()
    {
    }
    /**
     * validateQuotedPair
     */
    protected function validateQuotedPair()
    {
    }
    protected function parseComments()
    {
    }
    /**
     * @return bool
     */
    protected function isUnclosedComment()
    {
    }
    protected function parseFWS()
    {
    }
    protected function checkConsecutiveDots()
    {
    }
    /**
     * @return bool
     */
    protected function isFWS()
    {
    }
    /**
     * @return bool
     */
    protected function escaped()
    {
    }
    /**
     * @return bool
     */
    protected function warnEscaping()
    {
    }
    /**
     * @param bool $hasClosingQuote
     *
     * @return bool
     */
    protected function checkDQUOTE($hasClosingQuote)
    {
    }
    protected function checkCRLFInFWS()
    {
    }
}