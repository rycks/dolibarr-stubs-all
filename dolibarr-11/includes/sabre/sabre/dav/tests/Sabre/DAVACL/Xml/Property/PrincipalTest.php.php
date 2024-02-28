<?php

namespace Sabre\DAVACL\Xml\Property;

class PrincipalTest extends \PHPUnit_Framework_TestCase
{
    function testSimple()
    {
    }
    /**
     * @depends testSimple
     * @expectedException Sabre\DAV\Exception
     */
    function testNoHref()
    {
    }
    /**
     * @depends testSimple
     */
    function testSerializeUnAuthenticated()
    {
    }
    /**
     * @depends testSerializeUnAuthenticated
     */
    function testSerializeAuthenticated()
    {
    }
    /**
     * @depends testSerializeUnAuthenticated
     */
    function testSerializeHref()
    {
    }
    function testUnserializeHref()
    {
    }
    function testUnserializeAuthenticated()
    {
    }
    function testUnserializeUnauthenticated()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testUnserializeUnknown()
    {
    }
    function parse($xml)
    {
    }
    /**
     * @depends testSimple
     * @dataProvider htmlProvider
     */
    function testToHtml($principal, $output)
    {
    }
    /**
     * Provides data for the html tests
     *
     * @return array
     */
    function htmlProvider()
    {
    }
}