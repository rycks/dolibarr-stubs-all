<?php

namespace Sabre\HTTP\Auth;

class DigestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\HTTP\Response
     */
    private $response;
    /**
     * request
     *
     * @var Sabre\HTTP\Request
     */
    private $request;
    /**
     * @var Sabre\HTTP\Auth\Digest
     */
    private $auth;
    const REALM = 'SabreDAV unittest';
    function setUp()
    {
    }
    function testDigest()
    {
    }
    function testInvalidDigest()
    {
    }
    function testInvalidDigest2()
    {
    }
    function testDigestAuthInt()
    {
    }
    function testDigestAuthBoth()
    {
    }
    private function getServerTokens($qop = \Sabre\HTTP\Auth\Digest::QOP_AUTH)
    {
    }
}