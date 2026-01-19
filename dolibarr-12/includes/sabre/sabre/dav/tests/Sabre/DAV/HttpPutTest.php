<?php

namespace Sabre\DAV;

/**
 * Tests related to the PUT request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HttpPutTest extends \Sabre\DAVServerTest
{
    /**
     * Sets up the DAV tree.
     *
     * @return void
     */
    function setUpTree()
    {
    }
    /**
     * A successful PUT of a new file.
     */
    function testPut()
    {
    }
    /**
     * A successful PUT on an existing file.
     *
     * @depends testPut
     */
    function testPutExisting()
    {
    }
    /**
     * PUT on existing file with If-Match: *
     *
     * @depends testPutExisting
     */
    function testPutExistingIfMatchStar()
    {
    }
    /**
     * PUT on existing file with If-Match: with a correct etag
     *
     * @depends testPutExisting
     */
    function testPutExistingIfMatchCorrect()
    {
    }
    /**
     * PUT with Content-Range should be rejected.
     *
     * @depends testPut
     */
    function testPutContentRange()
    {
    }
    /**
     * PUT on non-existing file with If-None-Match: * should work.
     *
     * @depends testPut
     */
    function testPutIfNoneMatchStar()
    {
    }
    /**
     * PUT on non-existing file with If-Match: * should fail.
     *
     * @depends testPut
     */
    function testPutIfMatchStar()
    {
    }
    /**
     * PUT on existing file with If-None-Match: * should fail.
     *
     * @depends testPut
     */
    function testPutExistingIfNoneMatchStar()
    {
    }
    /**
     * PUT thats created in a non-collection should be rejected.
     *
     * @depends testPut
     */
    function testPutNoParent()
    {
    }
    /**
     * Finder may sometimes make a request, which gets its content-body
     * stripped. We can't always prevent this from happening, but in some cases
     * we can detected this and return an error instead.
     *
     * @depends testPut
     */
    function testFinderPutSuccess()
    {
    }
    /**
     * Same as the last one, but in this case we're mimicing a failed request.
     *
     * @depends testFinderPutSuccess
     */
    function testFinderPutFail()
    {
    }
    /**
     * Plugins can intercept PUT. We need to make sure that works.
     *
     * @depends testPut
     */
    function testPutIntercept()
    {
    }
}