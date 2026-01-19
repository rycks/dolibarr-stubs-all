<?php

namespace Sabre\DAV;

class ServerPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Sabre\DAV\Exception\PreconditionFailed
     */
    function testIfMatchNoNode()
    {
    }
    /**
     */
    function testIfMatchHasNode()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\PreconditionFailed
     */
    function testIfMatchWrongEtag()
    {
    }
    /**
     */
    function testIfMatchCorrectEtag()
    {
    }
    /**
     * Evolution sometimes uses \" instead of " for If-Match headers.
     *
     * @depends testIfMatchCorrectEtag
     */
    function testIfMatchEvolutionEtag()
    {
    }
    /**
     */
    function testIfMatchMultiple()
    {
    }
    /**
     */
    function testIfNoneMatchNoNode()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\PreconditionFailed
     */
    function testIfNoneMatchHasNode()
    {
    }
    /**
     */
    function testIfNoneMatchWrongEtag()
    {
    }
    /**
     */
    function testIfNoneMatchWrongEtagMultiple()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\PreconditionFailed
     */
    function testIfNoneMatchCorrectEtag()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\PreconditionFailed
     */
    function testIfNoneMatchCorrectEtagMultiple()
    {
    }
    /**
     */
    function testIfNoneMatchCorrectEtagAsGet()
    {
    }
    /**
     * This was a test written for issue #515.
     */
    function testNoneMatchCorrectEtagEnsureSapiSent()
    {
    }
    /**
     */
    function testIfModifiedSinceUnModified()
    {
    }
    /**
     */
    function testIfModifiedSinceModified()
    {
    }
    /**
     */
    function testIfModifiedSinceInvalidDate()
    {
    }
    /**
     */
    function testIfModifiedSinceInvalidDate2()
    {
    }
    /**
     */
    function testIfUnmodifiedSinceUnModified()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\PreconditionFailed
     */
    function testIfUnmodifiedSinceModified()
    {
    }
    /**
     */
    function testIfUnmodifiedSinceInvalidDate()
    {
    }
}
class ServerPreconditionsNode extends \Sabre\DAV\File
{
    function getETag()
    {
    }
    function getLastModified()
    {
    }
    function getName()
    {
    }
}