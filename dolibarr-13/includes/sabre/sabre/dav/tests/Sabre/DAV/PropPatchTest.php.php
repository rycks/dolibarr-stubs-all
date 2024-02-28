<?php

namespace Sabre\DAV;

class PropPatchTest extends \PHPUnit_Framework_TestCase
{
    protected $propPatch;
    function setUp()
    {
    }
    function testHandleSingleSuccess()
    {
    }
    function testHandleSingleFail()
    {
    }
    function testHandleSingleCustomResult()
    {
    }
    function testHandleSingleDeleteSuccess()
    {
    }
    function testHandleNothing()
    {
    }
    /**
     * @depends testHandleSingleSuccess
     */
    function testHandleRemaining()
    {
    }
    function testHandleRemainingNothingToDo()
    {
    }
    function testSetResultCode()
    {
    }
    function testSetResultCodeFail()
    {
    }
    function testSetRemainingResultCode()
    {
    }
    function testCommitNoHandler()
    {
    }
    function testHandlerNotCalled()
    {
    }
    function testDependencyFail()
    {
    }
    /**
     * @expectedException \UnexpectedValueException
     */
    function testHandleSingleBrokenResult()
    {
    }
    function testHandleMultiValueSuccess()
    {
    }
    function testHandleMultiValueFail()
    {
    }
    function testHandleMultiValueCustomResult()
    {
    }
    /**
     * @expectedException \UnexpectedValueException
     */
    function testHandleMultiValueBroken()
    {
    }
}