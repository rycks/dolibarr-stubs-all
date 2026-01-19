<?php

namespace Sabre\CalDAV;

class Issue172Test extends \PHPUnit_Framework_TestCase
{
    // DateTimeZone() native name: America/Los_Angeles (GMT-8 in January)
    function testBuiltInTimezoneName()
    {
    }
    // Pacific Standard Time, translates to America/Los_Angeles (GMT-8 in January)
    function testOutlookTimezoneName()
    {
    }
    // X-LIC-LOCATION, translates to America/Los_Angeles (GMT-8 in January)
    function testLibICalLocationName()
    {
    }
}