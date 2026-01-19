<?php

namespace Sabre\DAV\Xml\Element;

class ResponseTest extends \Sabre\DAV\Xml\XmlTest
{
    function testSimple()
    {
    }
    /**
     * @depends testSimple
     */
    function testSerialize()
    {
    }
    /**
     * This one is specifically for testing properties with no namespaces, which is legal xml
     *
     * @depends testSerialize
     */
    function testSerializeEmptyNamespace()
    {
    }
    /**
     * This one is specifically for testing properties with no namespaces, which is legal xml
     *
     * @depends testSerialize
     */
    function testSerializeCustomNamespace()
    {
    }
    /**
     * @depends testSerialize
     */
    function testSerializeComplexProperty()
    {
    }
    /**
     * @depends testSerialize
     * @expectedException \InvalidArgumentException
     */
    function testSerializeBreak()
    {
    }
    function testDeserializeComplexProperty()
    {
    }
    /**
     * @depends testSimple
     */
    function testSerializeUrlencoding()
    {
    }
    /**
     * @depends testSerialize
     *
     * The WebDAV spec _requires_ at least one DAV:propstat to appear for
     * every DAV:response. In some circumstances however, there are no
     * properties to encode.
     *
     * In those cases we MUST specify at least one DAV:propstat anyway, with
     * no properties.
     */
    function testSerializeNoProperties()
    {
    }
    /**
     * In the case of {DAV:}prop, a deserializer should never get called, if
     * the property element is empty.
     */
    function testDeserializeComplexPropertyEmpty()
    {
    }
}