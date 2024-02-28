<?php

namespace Sabre\VObject\Parser;

/**
 * Note that most MimeDir related tests can actually be found in the ReaderTest
 * class one level up.
 */
class MimeDirTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Sabre\VObject\ParseException
     */
    function testParseError()
    {
    }
    function testDecodeLatin1()
    {
    }
    function testDecodeInlineLatin1()
    {
    }
    function testIgnoreCharsetVCard30()
    {
    }
    function testDontDecodeLatin1()
    {
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    function testDecodeUnsupportedCharset()
    {
    }
    /**
     * @expectedException \Sabre\VObject\ParseException
     */
    function testDecodeUnsupportedInlineCharset()
    {
    }
    function testDecodeWindows1252()
    {
    }
    function testDecodeWindows1252Inline()
    {
    }
}