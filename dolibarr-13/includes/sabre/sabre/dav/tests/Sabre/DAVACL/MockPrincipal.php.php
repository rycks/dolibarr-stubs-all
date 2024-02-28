<?php

namespace Sabre\DAVACL;

class MockPrincipal extends \Sabre\DAV\Node implements \Sabre\DAVACL\IPrincipal
{
    public $name;
    public $principalUrl;
    public $groupMembership = [];
    public $groupMemberSet = [];
    function __construct($name, $principalUrl, array $groupMembership = [], array $groupMemberSet = [])
    {
    }
    function getName()
    {
    }
    function getDisplayName()
    {
    }
    function getAlternateUriSet()
    {
    }
    function getPrincipalUrl()
    {
    }
    function getGroupMemberSet()
    {
    }
    function getGroupMemberShip()
    {
    }
    function setGroupMemberSet(array $groupMemberSet)
    {
    }
}