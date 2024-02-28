<?php

namespace Sabre\DAVACL\PrincipalBackend;

abstract class AbstractPDOTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\DAV\DbTestHelperTrait;
    function setUp()
    {
    }
    function testConstruct()
    {
    }
    /**
     * @depends testConstruct
     */
    function testGetPrincipalsByPrefix()
    {
    }
    /**
     * @depends testConstruct
     */
    function testGetPrincipalByPath()
    {
    }
    function testGetGroupMemberSet()
    {
    }
    function testGetGroupMembership()
    {
    }
    function testSetGroupMemberSet()
    {
    }
    function testSearchPrincipals()
    {
    }
    function testUpdatePrincipal()
    {
    }
    function testUpdatePrincipalUnknownField()
    {
    }
    function testFindByUriUnknownScheme()
    {
    }
    function testFindByUri()
    {
    }
}