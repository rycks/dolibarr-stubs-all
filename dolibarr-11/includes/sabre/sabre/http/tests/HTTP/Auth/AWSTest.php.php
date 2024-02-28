<?php

namespace Sabre\HTTP\Auth;

class AWSTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\HTTP\Response
     */
    private $response;
    /**
     * @var Sabre\HTTP\Request
     */
    private $request;
    /**
     * @var Sabre\HTTP\Auth\AWS
     */
    private $auth;
    const REALM = 'SabreDAV unittest';
    function setUp()
    {
    }
    function testNoHeader()
    {
    }
    function testIncorrectContentMD5()
    {
    }
    function testNoDate()
    {
    }
    function testFutureDate()
    {
    }
    function testPastDate()
    {
    }
    function testIncorrectSignature()
    {
    }
    function testValidRequest()
    {
    }
    function test401()
    {
    }
    /**
     * Generates an HMAC-SHA1 signature
     *
     * @param string $key
     * @param string $message
     * @return string
     */
    private function hmacsha1($key, $message)
    {
    }
}