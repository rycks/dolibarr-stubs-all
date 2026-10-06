<?php

namespace Egulias\EmailValidator\Parser;

class DomainPart extends \Egulias\EmailValidator\Parser\Parser
{
    const DOMAIN_MAX_LENGTH = 254;
    const LABEL_MAX_LENGTH = 63;
    /**
     * @var string
     */
    protected $domainPart = '';
    public function parse($domainPart)
    {
    }
    private function performDomainStartChecks()
    {
    }
    private function checkEmptyDomain()
    {
    }
    private function checkInvalidTokensAfterAT()
    {
    }
    /**
     * @return string
     */
    public function getDomainPart()
    {
    }
    /**
     * @param string $addressLiteral
     * @param int $maxGroups
     */
    public function checkIPV6Tag($addressLiteral, $maxGroups = 8)
    {
    }
    /**
     * @return string
     */
    protected function doParseDomainPart()
    {
    }
    private function checkNotAllowedChars(array $token)
    {
    }
    /**
     * @return string|false
     */
    protected function parseDomainLiteral()
    {
    }
    /**
     * @return string|false
     */
    protected function doParseDomainLiteral()
    {
    }
    /**
     * @param string $addressLiteral
     *
     * @return string|false
     */
    protected function checkIPV4Tag($addressLiteral)
    {
    }
    protected function checkDomainPartExceptions(array $prev)
    {
    }
    /**
     * @return bool
     */
    protected function hasBrackets()
    {
    }
    /**
     * @param string $label
     */
    protected function checkLabelLength($label)
    {
    }
    /**
     * @param string $label
     * @return bool
     */
    private function isLabelTooLong($label)
    {
    }
    protected function parseDomainComments()
    {
    }
    protected function addTLDWarnings()
    {
    }
}