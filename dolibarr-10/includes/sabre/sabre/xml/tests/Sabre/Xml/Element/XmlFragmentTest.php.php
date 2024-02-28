<?php

namespace Sabre\Xml\Element;

class XmlFragmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider xmlProvider
     */
    function testDeserialize($input, $expected)
    {
    }
    /**
     * Data provider for serialize and deserialize tests.
     *
     * Returns three items per test:
     *
     * 1. Input data for the reader.
     * 2. Expected output for XmlFragment deserializer
     * 3. Expected output after serializing that value again.
     *
     * If 3 is not set, use 1 for 3.
     *
     * @return void
     */
    function xmlProvider()
    {
    }
    /**
     * @dataProvider xmlProvider
     */
    function testSerialize($expectedFallback, $input, $expected = null)
    {
    }
}