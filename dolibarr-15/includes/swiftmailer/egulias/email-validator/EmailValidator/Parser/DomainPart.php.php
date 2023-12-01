<?php

namespace Egulias\EmailValidator\Parser;

class DomainPart extends \Egulias\EmailValidator\Parser\Parser
{
    const DOMAIN_MAX_LENGTH = 254;
    protected $domainPart = '';
    public function parse($domainPart)
    {
    }
    public function getDomainPart()
    {
    }
    public function checkIPV6Tag($addressLiteral, $maxGroups = 8)
    {
    }
    protected function doParseDomainPart()
    {
    }
    private function checkNotAllowedChars($token)
    {
    }
    protected function parseDomainLiteral()
    {
    }
    protected function doParseDomainLiteral()
    {
    }
    protected function checkIPV4Tag($addressLiteral)
    {
    }
    protected function checkDomainPartExceptions($prev)
    {
    }
    protected function hasBrackets()
    {
    }
    protected function checkLabelLength($prev)
    {
    }
    protected function parseDomainComments()
    {
    }
    protected function addTLDWarnings()
    {
    }
}