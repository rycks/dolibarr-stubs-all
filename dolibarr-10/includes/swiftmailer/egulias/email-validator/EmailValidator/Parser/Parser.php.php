<?php

namespace Egulias\EmailValidator\Parser;

abstract class Parser
{
    protected $warnings = [];
    protected $lexer;
    protected $openedParenthesis = 0;
    public function __construct(\Egulias\EmailValidator\EmailLexer $lexer)
    {
    }
    public function getWarnings()
    {
    }
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
    protected function isUnclosedComment()
    {
    }
    protected function parseFWS()
    {
    }
    protected function checkConsecutiveDots()
    {
    }
    protected function isFWS()
    {
    }
    protected function escaped()
    {
    }
    protected function warnEscaping()
    {
    }
    protected function checkDQUOTE($hasClosingQuote)
    {
    }
    protected function checkCRLFInFWS()
    {
    }
}