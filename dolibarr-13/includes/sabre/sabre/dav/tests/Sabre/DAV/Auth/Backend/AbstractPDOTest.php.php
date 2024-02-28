<?php

namespace Sabre\DAV\Auth\Backend;

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
    function testUserInfo()
    {
    }
}