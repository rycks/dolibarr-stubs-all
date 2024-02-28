<?php

namespace Sabre\CardDAV;

class ValidateVCardTest extends \PHPUnit_Framework_TestCase
{
    protected $server;
    protected $cardBackend;
    function setUp()
    {
    }
    function request(\Sabre\HTTP\Request $request, $expectedStatus = null)
    {
    }
    function testCreateFile()
    {
    }
    function testCreateFileValid()
    {
    }
    /**
     * This test creates an intentionally broken vCard that vobject is able
     * to automatically repair.
     *
     * @depends testCreateFileValid
     */
    function testCreateVCardAutoFix()
    {
    }
    /**
     * This test creates an intentionally broken vCard that vobject is able
     * to automatically repair.
     *
     * However, we're supplying a heading asking the server to treat the
     * request as strict, so the server should still let the request fail.
     *
     * @depends testCreateFileValid
     */
    function testCreateVCardStrictFail()
    {
    }
    function testCreateFileNoUID()
    {
    }
    function testCreateFileJson()
    {
    }
    function testCreateFileVCalendar()
    {
    }
    function testUpdateFile()
    {
    }
    function testUpdateFileParsableBody()
    {
    }
}