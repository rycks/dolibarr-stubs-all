<?php

namespace Sabre\VObject\Component;

class VTodoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider timeRangeTestData
     */
    function testInTimeRange(\Sabre\VObject\Component\VTodo $vtodo, $start, $end, $outcome)
    {
    }
    function timeRangeTestData()
    {
    }
    function testValidate()
    {
    }
    function testValidateInvalid()
    {
    }
    function testValidateDUEDTSTARTMisMatch()
    {
    }
    function testValidateDUEbeforeDTSTART()
    {
    }
}