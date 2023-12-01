<?php

namespace Sabre\DAV\FSExt;

/**
 * File class.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends \Sabre\DAV\FS\Node implements \Sabre\DAV\PartialUpdate\IPatchSupport
{
    /**
     * Updates the data.
     *
     * Data is a readable stream resource.
     *
     * @param resource|string $data
     *
     * @return string
     */
    public function put($data)
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
     * * 1. append (default)
     * * 2. update based on a start byte
     * * 3. update based on an end byte
     *;
     * The third argument is the start or end byte.
     *
     * After a successful put operation, you may choose to return an ETag. The
     * ETAG must always be surrounded by double-quotes. These quotes must
     * appear in the actual string you're returning.
     *
     * Clients may use the ETag from a PUT request to later on make sure that
     * when they update the file, the contents haven't changed in the mean
     * time.
     *
     * @param resource|string $data
     * @param int             $rangeType
     * @param int             $offset
     *
     * @return string|null
     */
    public function patch($data, $rangeType, $offset = null)
    {
    }
    /**
     * Returns the data.
     *
     * @return resource
     */
    public function get()
    {
    }
    /**
     * Delete the current file.
     *
     * @return bool
     */
    public function delete()
    {
    }
    /**
     * Returns the ETag for a file.
     *
     * An ETag is a unique identifier representing the current version of the file. If the file changes, the ETag MUST change.
     * The ETag is an arbitrary string, but MUST be surrounded by double-quotes.
     *
     * Return null if the ETag can not effectively be determined
     *
     * @return string|null
     */
    public function getETag()
    {
    }
    /**
     * Returns the mime-type for a file.
     *
     * If null is returned, we'll assume application/octet-stream
     *
     * @return string|null
     */
    public function getContentType()
    {
    }
    /**
     * Returns the size of the file, in bytes.
     *
     * @return int
     */
    public function getSize()
    {
    }
}