<?php

namespace Egulias\EmailValidator;

/**
 * EmailParser
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class EmailParser
{
    const EMAIL_MAX_LENGTH = 254;
    protected $warnings;
    protected $domainPart = '';
    protected $localPart = '';
    protected $lexer;
    protected $localPartParser;
    protected $domainPartParser;
    public function __construct(\Egulias\EmailValidator\EmailLexer $lexer)
    {
    }
    /**
     * @param $str
     * @return array
     */
    public function parse($str)
    {
    }
    public function getWarnings()
    {
    }
    public function getParsedDomainPart()
    {
    }
    protected function setParts($email)
    {
    }
    protected function hasAtToken()
    {
    }
    /**
     * @param string $localPart
     * @param string $parsedDomainPart
     */
    protected function addLongEmailWarning($localPart, $parsedDomainPart)
    {
    }
}