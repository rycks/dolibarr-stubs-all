<?php

namespace Sabre\DAV\FS;

/**
 * File class.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends \Sabre\DAV\FS\Node implements \Sabre\DAV\IFile
{
    /**
     * Updates the data.
     *
     * @param resource $data
     */
    public function put($data)
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
     */
    public function delete()
    {
    }
    /**
     * Returns the size of the node, in bytes.
     *
     * @return int
     */
    public function getSize()
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
     * @return mixed
     */
    public function getETag()
    {
    }
    /**
     * Returns the mime-type for a file.
     *
     * If null is returned, we'll assume application/octet-stream
     *
     * @return mixed
     */
    public function getContentType()
    {
    }
}