<?php

namespace Sabre\DAV\Xml\Element;

class ShareeTest extends \Sabre\DAV\Xml\XmlTest
{
    /**
     * @expectedException \InvalidArgumentException
     */
    function testShareeUnknownPropertyInConstructor()
    {
    }
    function testDeserialize()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeNoHref()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeNoShareeAccess()
    {
    }
}