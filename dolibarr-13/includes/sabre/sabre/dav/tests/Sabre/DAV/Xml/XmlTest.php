<?php

namespace Sabre\DAV\Xml;

abstract class XmlTest extends \PHPUnit_Framework_TestCase
{
    protected $elementMap = [];
    protected $namespaceMap = ['DAV:' => 'd'];
    protected $contextUri = '/';
    function write($input)
    {
    }
    function parse($xml, array $elementMap = [])
    {
    }
    function assertParsedValue($expected, $xml, array $elementMap = [])
    {
    }
    function cleanUp()
    {
    }
}