<?php

namespace Sabre\CalDAV;

class ValidateICalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\DAV\Server
     */
    protected $server;
    /**
     * @var Sabre\CalDAV\Backend\Mock
     */
    protected $calBackend;
    function setUp()
    {
    }
    function request(\Sabre\HTTP\Request $request)
    {
    }
    function testCreateFile()
    {
    }
    function testCreateFileValid()
    {
    }
    function testCreateFileNoVersion()
    {
    }
    function testCreateFileNoVersionFixed()
    {
    }
    function testCreateFileNoComponents()
    {
    }
    function testCreateFileNoUID()
    {
    }
    function testCreateFileVCard()
    {
    }
    function testCreateFile2Components()
    {
    }
    function testCreateFile2UIDS()
    {
    }
    function testCreateFileWrongComponent()
    {
    }
    function testUpdateFile()
    {
    }
    function testUpdateFileParsableBody()
    {
    }
    function testCreateFileInvalidComponent()
    {
    }
    function testUpdateFileInvalidComponent()
    {
    }
    /**
     * What we are testing here, is if we send in a latin1 character, the
     * server should automatically transform this into UTF-8.
     *
     * More importantly. If any transformation happens, the etag must no longer
     * be returned by the server.
     */
    function testCreateFileModified()
    {
    }
}