<?php

namespace Sabre\HTTP;

class URLUtilTest extends \PHPUnit_Framework_TestCase
{
    function testEncodePath()
    {
    }
    function testEncodePathSegment()
    {
    }
    function testDecode()
    {
    }
    /**
     * @depends testDecode
     */
    function testDecodeUmlaut()
    {
    }
    /**
     * @depends testDecodeUmlaut
     */
    function testDecodeUmlautLatin1()
    {
    }
    /**
     * This testcase was sent by a bug reporter
     *
     * @depends testDecode
     */
    function testDecodeAccentsWindows7()
    {
    }
    function testSplitPath()
    {
    }
    /**
     * @dataProvider resolveData
     */
    function testResolve($base, $update, $expected)
    {
    }
    function resolveData()
    {
    }
}