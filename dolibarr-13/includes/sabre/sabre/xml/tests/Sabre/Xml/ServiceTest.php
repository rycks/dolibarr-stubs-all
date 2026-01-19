<?php

namespace Sabre\Xml;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    function testGetReader()
    {
    }
    function testGetWriter()
    {
    }
    /**
     * @depends testGetReader
     */
    function testParse()
    {
    }
    /**
     * @depends testGetReader
     */
    function testParseStream()
    {
    }
    /**
     * @depends testGetReader
     */
    function testExpect()
    {
    }
    /**
     * @depends testGetReader
     */
    function testExpectStream()
    {
    }
    /**
     * @depends testGetReader
     * @expectedException \Sabre\Xml\ParseException
     */
    function testExpectWrong()
    {
    }
    /**
     * @depends testGetWriter
     */
    function testWrite()
    {
    }
    function testMapValueObject()
    {
    }
    function testMapValueObjectArrayProperty()
    {
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    function testWriteVoNotFound()
    {
    }
    function testParseClarkNotation()
    {
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    function testParseClarkNotationFail()
    {
    }
}
/**
 * asset for testMapValueObject()
 * @internal
 */
class Order
{
    public $id;
    public $amount;
    public $description;
    public $status;
    public $empty;
    public $link = [];
}
/**
 * asset for testMapValueObject()
 * @internal
 */
class OrderStatus
{
    public $id;
    public $label;
}