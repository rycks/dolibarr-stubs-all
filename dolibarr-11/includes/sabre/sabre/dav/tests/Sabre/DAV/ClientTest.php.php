<?php

namespace Sabre\DAV;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
    }
    function testConstruct()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testConstructNoBaseUri()
    {
    }
    function testAuth()
    {
    }
    function testBasicAuth()
    {
    }
    function testDigestAuth()
    {
    }
    function testNTLMAuth()
    {
    }
    function testProxy()
    {
    }
    function testEncoding()
    {
    }
    function testPropFind()
    {
    }
    /**
     * @expectedException \Sabre\HTTP\ClientHttpException
     */
    function testPropFindError()
    {
    }
    function testPropFindDepth1()
    {
    }
    function testPropPatch()
    {
    }
    /**
     * @depends testPropPatch
     * @expectedException \Sabre\HTTP\ClientHttpException
     */
    function testPropPatchHTTPError()
    {
    }
    /**
     * @depends testPropPatch
     * @expectedException Sabre\HTTP\ClientException
     */
    function testPropPatchMultiStatusError()
    {
    }
    function testOPTIONS()
    {
    }
}