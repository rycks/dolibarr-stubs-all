<?php

namespace Sabre\VObject;

/**
 * Tests the cli.
 *
 * Warning: these tests are very rudimentary.
 */
class CliTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
    }
    function testInvalidArg()
    {
    }
    function testQuiet()
    {
    }
    function testHelp()
    {
    }
    function testFormat()
    {
    }
    function testFormatInvalid()
    {
    }
    function testInputFormatInvalid()
    {
    }
    function testNoInputFile()
    {
    }
    function testTooManyArgs()
    {
    }
    function testUnknownCommand()
    {
    }
    function testConvertJson()
    {
    }
    function testConvertJCardPretty()
    {
    }
    function testConvertJCalFail()
    {
    }
    function testConvertMimeDir()
    {
    }
    function testConvertDefaultFormats()
    {
    }
    function testConvertDefaultFormats2()
    {
    }
    function testVCard3040()
    {
    }
    function testVCard4030()
    {
    }
    function testVCard4021()
    {
    }
    function testValidate()
    {
    }
    function testValidateFail()
    {
    }
    function testValidateFail2()
    {
    }
    function testRepair()
    {
    }
    function testRepairNothing()
    {
    }
    /**
     * Note: this is a very shallow test, doesn't dig into the actual output,
     * but just makes sure there's no errors thrown.
     *
     * The colorizer is not a critical component, it's mostly a debugging tool.
     */
    function testColorCalendar()
    {
    }
    /**
     * Note: this is a very shallow test, doesn't dig into the actual output,
     * but just makes sure there's no errors thrown.
     *
     * The colorizer is not a critical component, it's mostly a debugging tool.
     */
    function testColorVCard()
    {
    }
}
class CliMock extends \Sabre\VObject\Cli
{
    public $quiet = false;
    public $format;
    public $pretty;
    public $stdin;
    public $stdout;
    public $stderr;
    public $inputFormat;
    public $outputFormat;
}