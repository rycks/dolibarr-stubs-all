<?php

namespace Sabre\VObject\Component;

class VCalendarTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\VObject\PHPUnitAssertions;
    /**
     * @dataProvider expandData
     */
    function testExpand($input, $output, $timeZone = 'UTC', $start = '2011-12-01', $end = '2011-12-31')
    {
    }
    function expandData()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testBrokenEventExpand()
    {
    }
    function testGetDocumentType()
    {
    }
    function testValidateCorrect()
    {
    }
    function testValidateNoVersion()
    {
    }
    function testValidateWrongVersion()
    {
    }
    function testValidateNoProdId()
    {
    }
    function testValidateDoubleCalScale()
    {
    }
    function testValidateDoubleMethod()
    {
    }
    function testValidateTwoMasterEvents()
    {
    }
    function testValidateOneMasterEvent()
    {
    }
    function testGetBaseComponent()
    {
    }
    function testGetBaseComponentNoResult()
    {
    }
    function testGetBaseComponentWithFilter()
    {
    }
    function testGetBaseComponentWithFilterNoResult()
    {
    }
    function testNoComponents()
    {
    }
    function testCalDAVNoComponents()
    {
    }
    function testCalDAVMultiUID()
    {
    }
    function testCalDAVMultiComponent()
    {
    }
    function testCalDAVMETHOD()
    {
    }
    function assertValidate($ics, $options, $expectedLevel, $expectedMessage = null)
    {
    }
    function assertValidateResult($input, $expectedLevel, $expectedMessage = null)
    {
    }
}