<?php

namespace Sabre\DAV;

/**
 * Tests related to the HEAD request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HttpHeadTest extends \Sabre\DAVServerTest
{
    /**
     * Sets up the DAV tree.
     *
     * @return void
     */
    function setUpTree()
    {
    }
    function testHEAD()
    {
    }
    /**
     * According to the specs, HEAD should behave identical to GET. But, broken
     * clients needs HEAD requests on collections to respond with a 200, so
     * that's what we do.
     */
    function testHEADCollection()
    {
    }
    /**
     * HEAD automatically internally maps to GET via a sub-request.
     * The Auth plugin must not be triggered twice for these, so we'll
     * test for that.
     */
    function testDoubleAuth()
    {
    }
}