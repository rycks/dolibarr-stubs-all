<?php

namespace Egulias\EmailValidator\Validation;

class DNSCheckValidation implements \Egulias\EmailValidator\Validation\EmailValidation
{
    /**
     * @var array
     */
    private $warnings = [];
    /**
     * @var InvalidEmail|null
     */
    private $error;
    /**
     * @var array
     */
    private $mxRecords = [];
    public function __construct()
    {
    }
    public function isValid($email, \Egulias\EmailValidator\EmailLexer $emailLexer)
    {
    }
    public function getError()
    {
    }
    public function getWarnings()
    {
    }
    /**
     * @param string $host
     *
     * @return bool
     */
    protected function checkDns($host)
    {
    }
    /**
     * Validate the DNS records for given host.
     *
     * @param string $host A set of DNS records in the format returned by dns_get_record.
     *
     * @return bool True on success.
     */
    private function validateDnsRecords($host)
    {
    }
    /**
     * Validate an MX record
     *
     * @param array $dnsRecord Given DNS record.
     *
     * @return bool True if valid.
     */
    private function validateMxRecord($dnsRecord)
    {
    }
}