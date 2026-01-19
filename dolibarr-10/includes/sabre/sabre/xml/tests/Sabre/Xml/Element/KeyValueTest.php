<?php

namespace Sabre\Xml\Element;

class KeyValueTest extends \PHPUnit_Framework_TestCase
{
    function testDeserialize()
    {
    }
    /**
     * This test was added to find out why an element gets eaten by the
     * SabreDAV MKCOL parser.
     */
    function testElementEater()
    {
    }
    function testSerialize()
    {
    }
    /**
     * I discovered that when there's no whitespace between elements, elements
     * can get skipped.
     */
    function testElementSkipProblem()
    {
    }
}