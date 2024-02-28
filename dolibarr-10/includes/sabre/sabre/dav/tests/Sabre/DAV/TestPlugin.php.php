<?php

namespace Sabre\DAV;

class TestPlugin extends \Sabre\DAV\ServerPlugin
{
    public $beforeMethod;
    function getFeatures()
    {
    }
    function getHTTPMethods($uri)
    {
    }
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    function beforeMethod(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
}