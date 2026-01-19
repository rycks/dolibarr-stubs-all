<?php

namespace Sabre\DAVACL;

class ACLMethodTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testCallback()
    {
    }
    /**
    /**
    * @expectedException Sabre\DAV\Exception\MethodNotAllowed
    */
    function testNotSupportedByNode()
    {
    }
    function testSuccessSimple()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NotRecognizedPrincipal
     */
    function testUnrecognizedPrincipal()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NotRecognizedPrincipal
     */
    function testUnrecognizedPrincipal2()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NotSupportedPrivilege
     */
    function testUnknownPrivilege()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NoAbstract
     */
    function testAbstractPrivilege()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\AceConflict
     */
    function testUpdateProtectedPrivilege()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\AceConflict
     */
    function testUpdateProtectedPrivilege2()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\AceConflict
     */
    function testUpdateProtectedPrivilege3()
    {
    }
    function testSuccessComplex()
    {
    }
}