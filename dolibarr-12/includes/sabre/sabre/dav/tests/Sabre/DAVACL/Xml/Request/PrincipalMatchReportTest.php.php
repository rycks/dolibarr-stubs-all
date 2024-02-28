<?php

namespace Sabre\DAVACL\Xml\Request;

class PrincipalMatchReportTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{DAV:}principal-match' => 'Sabre\\DAVACL\\Xml\\Request\\PrincipalMatchReport'];
    function testDeserialize()
    {
    }
    function testDeserializeSelf()
    {
    }
}