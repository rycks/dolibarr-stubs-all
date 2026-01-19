<?php

namespace Sabre\DAVACL;

class MockACLNode extends \Sabre\DAV\Node implements \Sabre\DAVACL\IACL
{
    public $name;
    public $acl;
    function __construct($name, array $acl = [])
    {
    }
    function getName()
    {
    }
    function getOwner()
    {
    }
    function getGroup()
    {
    }
    function getACL()
    {
    }
    function setACL(array $acl)
    {
    }
    function getSupportedPrivilegeSet()
    {
    }
}