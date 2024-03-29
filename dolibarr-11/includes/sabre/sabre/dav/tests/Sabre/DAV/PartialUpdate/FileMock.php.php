<?php

namespace Sabre\DAV\PartialUpdate;

class FileMock implements \Sabre\DAV\PartialUpdate\IPatchSupport
{
    protected $data = '';
    function put($str)
    {
    }
    /**
     * Updates the file based on a range specification.
     *
     * The first argument is the data, which is either a readable stream
     * resource or a string.
     *
     * The second argument is the type of update we're doing.
     * This is either:
     * * 1. append
     * * 2. update based on a start byte
     * * 3. update based on an end byte
     *;
     * The third argument is the start or end byte.
     *
     * After a successful put operation, you may choose to return an ETag. The
     * etag must always be surrounded by double-quotes. These quotes must
     * appear in the actual string you're returning.
     *
     * Clients may use the ETag from a PUT request to later on make sure that
     * when they update the file, the contents haven't changed in the mean
     * time.
     *
     * @param resource|string $data
     * @param int $rangeType
     * @param int $offset
     * @return string|null
     */
    function patch($data, $rangeType, $offset = null)
    {
    }
    function get()
    {
    }
    function getContentType()
    {
    }
    function getSize()
    {
    }
    function getETag()
    {
    }
    function delete()
    {
    }
    function setName($name)
    {
    }
    function getName()
    {
    }
    function getLastModified()
    {
    }
}