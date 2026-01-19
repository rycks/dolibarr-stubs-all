<?php

namespace Sabre\VObject;

/**
 * Google produces vcards with a weird escaping of urls.
 *
 * VObject will provide a workaround for this, so end-user still get expected
 * values.
 */
class GoogleColonEscapingTest extends \PHPUnit_Framework_TestCase
{
    function testDecode()
    {
    }
}