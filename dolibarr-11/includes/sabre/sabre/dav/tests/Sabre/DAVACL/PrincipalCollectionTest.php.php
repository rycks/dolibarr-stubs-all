<?php

namespace Sabre\DAVACL;

class PrincipalCollectionTest extends \PHPUnit_Framework_TestCase
{
    function testBasic()
    {
    }
    /**
     * @depends testBasic
     */
    function testGetChildren()
    {
    }
    /**
     * @depends testBasic
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testGetChildrenDisable()
    {
    }
    function testFindByUri()
    {
    }
}