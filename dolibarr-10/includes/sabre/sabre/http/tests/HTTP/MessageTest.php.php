<?php

namespace Sabre\HTTP;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    function testConstruct()
    {
    }
    function testStreamBody()
    {
    }
    function testStringBody()
    {
    }
    /**
     * It's possible that streams contains more data than the Content-Length.
     *
     * The request object should make sure to never emit more than
     * Content-Length, if Content-Length is set.
     *
     * This is in particular useful when respoding to range requests with
     * streams that represent files on the filesystem, as it's possible to just
     * seek the stream to a certain point, set the content-length and let the
     * request object do the rest.
     */
    function testLongStreamToStringBody()
    {
    }
    /**
     * Some clients include a content-length header, but the header is empty.
     * This is definitely broken behavior, but we should support it.
     */
    function testEmptyContentLengthHeader()
    {
    }
    function testGetEmptyBodyStream()
    {
    }
    function testGetEmptyBodyString()
    {
    }
    function testHeaders()
    {
    }
    function testSetHeaders()
    {
    }
    function testAddHeaders()
    {
    }
    function testSendBody()
    {
    }
    function testMultipleHeaders()
    {
    }
    function testHasHeaders()
    {
    }
}
class MessageMock extends \Sabre\HTTP\Message
{
}