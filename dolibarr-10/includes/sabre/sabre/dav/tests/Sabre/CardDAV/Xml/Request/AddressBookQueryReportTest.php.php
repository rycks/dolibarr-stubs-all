<?php

namespace Sabre\CardDAV\Xml\Request;

class AddressBookQueryReportTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{urn:ietf:params:xml:ns:carddav}addressbook-query' => 'Sabre\\CardDAV\\Xml\\Request\\AddressBookQueryReport'];
    function testDeserialize()
    {
    }
    function testDeserializeAllOf()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeBadTest()
    {
    }
    /**
     * We should error on this, but KDE does this, so we chose to support it.
     */
    function testDeserializeNoFilter()
    {
    }
    function testDeserializeComplex()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeBadMatchType()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeBadMatchType2()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeDoubleFilter()
    {
    }
    function testDeserializeAddressbookElements()
    {
    }
}