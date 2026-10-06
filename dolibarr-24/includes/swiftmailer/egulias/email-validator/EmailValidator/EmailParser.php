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
    /**
     * @var array
     */
    protected $warnings = [];
    /**
     * @var string
     */
    protected $domainPart = '';
    /**
     * @var string
     */
    protected $localPart = '';
    /**
     * @var EmailLexer
     */
    protected $lexer;
    /**
     * @var LocalPart
     */
    protected $localPartParser;
    /**
     * @var DomainPart
     */
    protected $domainPartParser;
    public function __construct(\Egulias\EmailValidator\EmailLexer $lexer)
    {
    }
    /**
     * @param string $str
     * @return array
     */
    public function parse($str)
    {
    }
    /**
     * @return Warning\Warning[]
     */
    public function getWarnings()
    {
    }
    /**
     * @return string
     */
    public function getParsedDomainPart()
    {
    }
    /**
     * @param string $email
     */
    protected function setParts($email)
    {
    }
    /**
     * @return bool
     */
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