<?php

namespace Sabre\HTTP;

class SapiTest extends \PHPUnit_Framework_TestCase
{
    function testConstructFromServerArray()
    {
    }
    function testConstructPHPAuth()
    {
    }
    function testConstructPHPAuthDigest()
    {
    }
    function testConstructRedirectAuth()
    {
    }
    /**
     * @runInSeparateProcess
     *
     * Unfortunately we have no way of testing if the HTTP response code got
     * changed.
     */
    function testSend()
    {
    }
    /**
     * @runInSeparateProcess
     * @depends testSend
     */
    function testSendLimitedByContentLengthString()
    {
    }
    /**
     * @runInSeparateProcess
     * @depends testSend
     */
    function testSendLimitedByContentLengthStream()
    {
    }
}