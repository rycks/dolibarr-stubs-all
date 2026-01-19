<?php

namespace Sabre\VObject;

class ParameterTest extends \PHPUnit_Framework_TestCase
{
    function testSetup()
    {
    }
    function testSetupNameLess()
    {
    }
    function testModify()
    {
    }
    function testCastToString()
    {
    }
    function testCastNullToString()
    {
    }
    function testSerialize()
    {
    }
    function testSerializeEmpty()
    {
    }
    function testSerializeComplex()
    {
    }
    /**
     * iCal 7.0 (OSX 10.9) has major issues with the EMAIL property, when the
     * value contains a plus sign, and it's not quoted.
     *
     * So we specifically added support for that.
     */
    function testSerializePlusSign()
    {
    }
    function testIterate()
    {
    }
    function testSerializeColon()
    {
    }
    function testSerializeSemiColon()
    {
    }
}