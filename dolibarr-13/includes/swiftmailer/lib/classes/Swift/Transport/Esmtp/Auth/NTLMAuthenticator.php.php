<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * This authentication is for Exchange servers. We support version 1 & 2.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Handles NTLM authentication.
 *
 * @author     Ward Peeters <ward@coding-tech.com>
 */
class Swift_Transport_Esmtp_Auth_NTLMAuthenticator implements \Swift_Transport_Esmtp_Authenticator
{
    const NTLMSIG = "NTLMSSP\x00";
    const DESCONST = 'KGS!@#$%';
    /**
     * Get the name of the AUTH mechanism this Authenticator handles.
     *
     * @return string
     */
    public function getAuthKeyword()
    {
    }
    /**
     * Try to authenticate the user with $username and $password.
     *
     * @param Swift_Transport_SmtpAgent $agent
     * @param string                    $username
     * @param string                    $password
     *
     * @return bool
     *
     * @throws \LogicException
     */
    public function authenticate(\Swift_Transport_SmtpAgent $agent, $username, $password)
    {
    }
    protected function si2bin($si, $bits = 32)
    {
    }
    /**
     * Send our auth message and returns the response.
     *
     * @param Swift_Transport_SmtpAgent $agent
     *
     * @return string SMTP Response
     */
    protected function sendMessage1(\Swift_Transport_SmtpAgent $agent)
    {
    }
    /**
     * Fetch all details of our response (message 2).
     *
     * @param string $response
     *
     * @return array our response parsed
     */
    protected function parseMessage2($response)
    {
    }
    /**
     * Read the blob information in from message2.
     *
     * @param $block
     *
     * @return array
     */
    protected function readSubBlock($block)
    {
    }
    /**
     * Send our final message with all our data.
     *
     * @param string                    $response  Message 1 response (message 2)
     * @param string                    $username
     * @param string                    $password
     * @param string                    $timestamp
     * @param string                    $client
     * @param Swift_Transport_SmtpAgent $agent
     * @param bool                      $v2        Use version2 of the protocol
     *
     * @return string
     */
    protected function sendMessage3($response, $username, $password, $timestamp, $client, \Swift_Transport_SmtpAgent $agent, $v2 = \true)
    {
    }
    /**
     * Create our message 1.
     *
     * @return string
     */
    protected function createMessage1()
    {
    }
    /**
     * Create our message 3.
     *
     * @param string $domain
     * @param string $username
     * @param string $workstation
     * @param string $lmResponse
     * @param string $ntlmResponse
     *
     * @return string
     */
    protected function createMessage3($domain, $username, $workstation, $lmResponse, $ntlmResponse)
    {
    }
    /**
     * @param string $timestamp  Epoch timestamp in microseconds
     * @param string $client     Random bytes
     * @param string $targetInfo
     *
     * @return string
     */
    protected function createBlob($timestamp, $client, $targetInfo)
    {
    }
    /**
     * Get domain and username from our username.
     *
     * @example DOMAIN\username
     *
     * @param string $name
     *
     * @return array
     */
    protected function getDomainAndUsername($name)
    {
    }
    /**
     * Create LMv1 response.
     *
     * @param string $password
     * @param string $challenge
     *
     * @return string
     */
    protected function createLMPassword($password, $challenge)
    {
    }
    /**
     * Create NTLMv1 response.
     *
     * @param string $password
     * @param string $challenge
     *
     * @return string
     */
    protected function createNTLMPassword($password, $challenge)
    {
    }
    /**
     * Convert a normal timestamp to a tenth of a microtime epoch time.
     *
     * @param string $time
     *
     * @return string
     */
    protected function getCorrectTimestamp($time)
    {
    }
    /**
     * Create LMv2 response.
     *
     * @param string $password
     * @param string $username
     * @param string $domain
     * @param string $challenge NTLM Challenge
     * @param string $client    Random string
     *
     * @return string
     */
    protected function createLMv2Password($password, $username, $domain, $challenge, $client)
    {
    }
    /**
     * Create NTLMv2 response.
     *
     * @param string $password
     * @param string $username
     * @param string $domain
     * @param string $challenge  Hex values
     * @param string $targetInfo Hex values
     * @param string $timestamp
     * @param string $client     Random bytes
     *
     * @return string
     *
     * @see http://davenport.sourceforge.net/ntlm.html#theNtlmResponse
     */
    protected function createNTLMv2Hash($password, $username, $domain, $challenge, $targetInfo, $timestamp, $client)
    {
    }
    protected function createDesKey($key)
    {
    }
    /** HELPER FUNCTIONS */
    /**
     * Create our security buffer depending on length and offset.
     *
     * @param string $value  Value we want to put in
     * @param int    $offset start of value
     * @param bool   $is16   Do we 16bit string or not?
     *
     * @return string
     */
    protected function createSecurityBuffer($value, $offset, $is16 = \false)
    {
    }
    /**
     * Read our security buffer to fetch length and offset of our value.
     *
     * @param string $value Securitybuffer in hex
     *
     * @return array array with length and offset
     */
    protected function readSecurityBuffer($value)
    {
    }
    /**
     * Cast to byte java equivalent to (byte).
     *
     * @param int $v
     *
     * @return int
     */
    protected function castToByte($v)
    {
    }
    /**
     * Java unsigned right bitwise
     * $a >>> $b.
     *
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    protected function uRShift($a, $b)
    {
    }
    /**
     * Right padding with 0 to certain length.
     *
     * @param string $input
     * @param int    $bytes Length of bytes
     * @param bool   $isHex Did we provided hex value
     *
     * @return string
     */
    protected function createByte($input, $bytes = 4, $isHex = \true)
    {
    }
    /**
     * Create random bytes.
     *
     * @param $length
     *
     * @return string
     */
    protected function getRandomBytes($length)
    {
    }
    /** ENCRYPTION ALGORITHMS */
    /**
     * DES Encryption.
     *
     * @param string $value An 8-byte string
     * @param string $key
     *
     * @return string
     */
    protected function desEncrypt($value, $key)
    {
    }
    /**
     * MD5 Encryption.
     *
     * @param string $key Encryption key
     * @param string $msg Message to encrypt
     *
     * @return string
     */
    protected function md5Encrypt($key, $msg)
    {
    }
    /**
     * MD4 Encryption.
     *
     * @param string $input
     *
     * @return string
     *
     * @see http://php.net/manual/en/ref.hash.php
     */
    protected function md4Encrypt($input)
    {
    }
    /**
     * Convert UTF-8 to UTF-16.
     *
     * @param string $input
     *
     * @return string
     */
    protected function convertTo16bit($input)
    {
    }
    /**
     * @param string $message
     */
    protected function debug($message)
    {
    }
}