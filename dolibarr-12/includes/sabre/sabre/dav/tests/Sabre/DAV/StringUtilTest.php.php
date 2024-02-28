<?php

namespace Sabre\DAV;

class StringUtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $haystack
     * @param string $needle
     * @param string $collation
     * @param string $matchType
     * @param string $result
     * @throws Exception\BadRequest
     *
     * @dataProvider dataset
     */
    function testTextMatch($haystack, $needle, $collation, $matchType, $result)
    {
    }
    function dataset()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testBadCollation()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testBadMatchType()
    {
    }
    function testEnsureUTF8_ascii()
    {
    }
    function testEnsureUTF8_latin1()
    {
    }
    function testEnsureUTF8_utf8()
    {
    }
}