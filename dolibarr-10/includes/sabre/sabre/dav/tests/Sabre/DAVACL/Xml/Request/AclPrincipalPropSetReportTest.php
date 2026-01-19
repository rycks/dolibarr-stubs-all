<?php

namespace Sabre\DAVACL\Xml\Request;

class AclPrincipalPropSetReportTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{DAV:}acl-principal-prop-set' => 'Sabre\\DAVACL\\Xml\\Request\\AclPrincipalPropSetReport'];
    function testDeserialize()
    {
    }
}