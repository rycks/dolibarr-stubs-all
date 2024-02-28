<?php

namespace Sabre\Xml;

class ReaderTest extends \PHPUnit_Framework_TestCase
{
    function testGetClark()
    {
    }
    function testGetClarkNoNS()
    {
    }
    function testGetClarkNotOnAnElement()
    {
    }
    function testSimple()
    {
    }
    function testCDATA()
    {
    }
    function testSimpleNamespacedAttribute()
    {
    }
    function testMappedElement()
    {
    }
    /**
     * @expectedException \LogicException
     */
    function testMappedElementBadClass()
    {
    }
    /**
     * @depends testMappedElement
     */
    function testMappedElementCallBack()
    {
    }
    /**
     * @depends testMappedElementCallBack
     */
    function testMappedElementCallBackNoNamespace()
    {
    }
    /**
     * @depends testMappedElementCallBack
     */
    function testReadText()
    {
    }
    function testParseProblem()
    {
    }
    /**
     * @expectedException \Sabre\Xml\ParseException
     */
    function testBrokenParserClass()
    {
    }
    /**
     * Test was added for Issue #10.
     *
     * @expectedException Sabre\Xml\LibXMLException
     */
    function testBrokenXml()
    {
    }
    /**
     * Test was added for Issue #45.
     *
     * @expectedException Sabre\Xml\LibXMLException
     */
    function testBrokenXml2()
    {
    }
    /**
     * @depends testMappedElement
     */
    function testParseInnerTree()
    {
    }
    /**
     * @depends testParseInnerTree
     */
    function testParseGetElements()
    {
    }
    /**
     * @depends testParseInnerTree
     */
    function testParseGetElementsNoElements()
    {
    }
}