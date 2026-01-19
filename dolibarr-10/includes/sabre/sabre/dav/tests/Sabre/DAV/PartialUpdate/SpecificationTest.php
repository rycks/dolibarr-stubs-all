<?php

namespace Sabre\DAV\PartialUpdate;

/**
 * This test is an end-to-end sabredav test that goes through all
 * the cases in the specification.
 *
 * See: http://sabre.io/dav/http-patch/
 */
class SpecificationTest extends \PHPUnit_Framework_TestCase
{
    protected $server;
    function setUp()
    {
    }
    function tearDown()
    {
    }
    /**
     * @param string $headerValue
     * @param string $httpStatus
     * @param string $endResult
     * @param int $contentLength
     *
     * @dataProvider data
     */
    function testUpdateRange($headerValue, $httpStatus, $endResult, $contentLength = 4)
    {
    }
    function data()
    {
    }
}