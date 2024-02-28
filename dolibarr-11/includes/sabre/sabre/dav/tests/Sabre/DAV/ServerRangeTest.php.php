<?php

namespace Sabre\DAV;

/**
 * This file tests HTTP requests that use the Range: header.
 *
 * @copyright Copyright (C) fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ServerRangeTest extends \Sabre\DAVServerTest
{
    protected $setupFiles = true;
    /**
     * We need this string a lot
     */
    protected $lastModified;
    function setUp()
    {
    }
    function testRange()
    {
    }
    /**
     * @depends testRange
     */
    function testStartRange()
    {
    }
    /**
     * @depends testRange
     */
    function testEndRange()
    {
    }
    /**
     * @depends testRange
     */
    function testTooHighRange()
    {
    }
    /**
     * @depends testRange
     */
    function testCrazyRange()
    {
    }
    function testNonSeekableStream()
    {
    }
    /**
     * @depends testRange
     */
    function testIfRangeEtag()
    {
    }
    /**
     * @depends testIfRangeEtag
     */
    function testIfRangeEtagIncorrect()
    {
    }
    /**
     * @depends testIfRangeEtag
     */
    function testIfRangeModificationDate()
    {
    }
    /**
     * @depends testIfRangeModificationDate
     */
    function testIfRangeModificationDateModified()
    {
    }
}