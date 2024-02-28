<?php

namespace Sabre\VObject;

class ReaderTest extends \PHPUnit_Framework_TestCase
{
    function testReadComponent()
    {
    }
    function testReadStream()
    {
    }
    function testReadComponentUnixNewLine()
    {
    }
    function testReadComponentLineFold()
    {
    }
    /**
     * @expectedException Sabre\VObject\ParseException
     */
    function testReadCorruptComponent()
    {
    }
    /**
     * @expectedException Sabre\VObject\ParseException
     */
    function testReadCorruptSubComponent()
    {
    }
    function testReadProperty()
    {
    }
    function testReadPropertyWithNewLine()
    {
    }
    function testReadMappedProperty()
    {
    }
    function testReadMappedPropertyGrouped()
    {
    }
    /**
     * @expectedException Sabre\VObject\ParseException
     */
    function testReadBrokenLine()
    {
    }
    function testReadPropertyInComponent()
    {
    }
    function testReadNestedComponent()
    {
    }
    function testReadPropertyParameter()
    {
    }
    function testReadPropertyRepeatingParameter()
    {
    }
    function testReadPropertyRepeatingNamelessGuessedParameter()
    {
    }
    function testReadPropertyNoName()
    {
    }
    function testReadPropertyParameterExtraColon()
    {
    }
    function testReadProperty2Parameters()
    {
    }
    function testReadPropertyParameterQuoted()
    {
    }
    function testReadPropertyParameterNewLines()
    {
    }
    function testReadPropertyParameterQuotedColon()
    {
    }
    function testReadForgiving()
    {
    }
    function testReadWithInvalidLine()
    {
    }
    /**
     * Reported as Issue 32.
     *
     * @expectedException \Sabre\VObject\ParseException
     */
    function testReadIncompleteFile()
    {
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    function testReadBrokenInput()
    {
    }
    function testReadBOM()
    {
    }
    function testReadXMLComponent()
    {
    }
    function testReadXMLStream()
    {
    }
}