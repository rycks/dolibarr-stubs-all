<?php

namespace Sabre\DAV;

class ServerSimpleTest extends \Sabre\DAV\AbstractServer
{
    function testConstructArray()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception
     */
    function testConstructIncorrectObj()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception
     */
    function testConstructInvalidArg()
    {
    }
    function testOptions()
    {
    }
    function testOptionsUnmapped()
    {
    }
    function testNonExistantMethod()
    {
    }
    function testBaseUri()
    {
    }
    function testBaseUriAddSlash()
    {
    }
    function testCalculateUri()
    {
    }
    function testCalculateUriSpecialChars()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     */
    function testCalculateUriBreakout()
    {
    }
    /**
     */
    function testGuessBaseUri()
    {
    }
    /**
     * @depends testGuessBaseUri
     */
    function testGuessBaseUriPercentEncoding()
    {
    }
    /**
     * @depends testGuessBaseUri
     */
    /*
        function testGuessBaseUriPercentEncoding2() {
    
            $this->markTestIncomplete('This behaviour is not yet implemented');
            $serverVars = [
                'REQUEST_URI' => '/some%20directory+mixed/index.php/dir/path2/path%20with%20spaces',
                'PATH_INFO'   => '/dir/path2/path with spaces',
            ];
    
            $httpRequest = HTTP\Sapi::createFromServerArray($serverVars);
            $server = new Server();
            $server->httpRequest = $httpRequest;
    
            $this->assertEquals('/some%20directory+mixed/index.php/', $server->guessBaseUri());
    
        }*/
    function testGuessBaseUri2()
    {
    }
    function testGuessBaseUriNoPathInfo()
    {
    }
    function testGuessBaseUriNoPathInfo2()
    {
    }
    /**
     * @depends testGuessBaseUri
     */
    function testGuessBaseUriQueryString()
    {
    }
    /**
     * @depends testGuessBaseUri
     * @expectedException \Sabre\DAV\Exception
     */
    function testGuessBaseUriBadConfig()
    {
    }
    function testTriggerException()
    {
    }
    function exceptionTrigger($request, $response)
    {
    }
    function testReportNotFound()
    {
    }
    function testReportIntercepted()
    {
    }
    function reportHandler($reportName, $result, $path)
    {
    }
    function testGetPropertiesForChildren()
    {
    }
    /**
     * There are certain cases where no HTTP status may be set. We need to
     * intercept these and set it to a default error message.
     */
    function testNoHTTPStatusSet()
    {
    }
}