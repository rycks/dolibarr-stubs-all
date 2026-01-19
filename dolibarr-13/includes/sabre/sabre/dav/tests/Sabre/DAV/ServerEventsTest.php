<?php

namespace Sabre\DAV;

class ServerEventsTest extends \Sabre\DAV\AbstractServer
{
    private $tempPath;
    private $exception;
    function testAfterBind()
    {
    }
    function afterBindHandler($path)
    {
    }
    function testAfterResponse()
    {
    }
    function testBeforeBindCancel()
    {
    }
    function beforeBindCancelHandler($path)
    {
    }
    function testException()
    {
    }
    function exceptionHandler(\Sabre\DAV\Exception $exception)
    {
    }
    function testMethod()
    {
    }
}