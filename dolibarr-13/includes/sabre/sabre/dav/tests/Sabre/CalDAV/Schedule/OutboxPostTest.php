<?php

namespace Sabre\CalDAV\Schedule;

class OutboxPostTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $setupACL = true;
    protected $autoLogin = 'user1';
    protected $setupCalDAVScheduling = true;
    function testPostPassThruNotFound()
    {
    }
    function testPostPassThruNotTextCalendar()
    {
    }
    function testPostPassThruNoOutBox()
    {
    }
    function testInvalidIcalBody()
    {
    }
    function testNoVEVENT()
    {
    }
    function testNoMETHOD()
    {
    }
    function testUnsupportedMethod()
    {
    }
}