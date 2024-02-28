<?php

namespace Sabre\DAV;

abstract class AbstractServer extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\HTTP\ResponseMock
     */
    protected $response;
    protected $request;
    /**
     * @var Sabre\DAV\Server
     */
    protected $server;
    protected $tempDir = SABRE_TEMPDIR;
    function setUp()
    {
    }
    function tearDown()
    {
    }
    protected function getRootNode()
    {
    }
    private function deleteTree($path, $deleteRoot = true)
    {
    }
}