<?php

namespace Sabre\CardDAV\Xml\Request;

class AddressBookMultiGetTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{urn:ietf:params:xml:ns:carddav}addressbook-multiget' => 'Sabre\\CardDAV\\Xml\\Request\\AddressBookMultiGetReport'];
    function testDeserialize()
    {
    }
}