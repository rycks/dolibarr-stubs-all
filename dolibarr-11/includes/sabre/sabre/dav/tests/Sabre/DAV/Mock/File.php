<?php

namespace Sabre\DAV\Mock;

/**
 * Mock File
 *
 * See the Collection in this directory for more details.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends \Sabre\DAV\File
{
    protected $name;
    protected $contents;
    protected $parent;
    protected $lastModified;
    /**
     * Creates the object
     *
     * @param string $name
     * @param resource $contents
     * @param Collection $parent
     * @param int $lastModified
     * @return void
     */
    function __construct($name, $contents, \Sabre\DAV\Mock\Collection $parent = null, $lastModified = -1)
    {
    }
    /**
     * Returns the name of the node.
     *
     * This is used to generate the url.
     *
     * @return string
     */
    function getName()
    {
    }
    /**
     * Changes the name of the node.
     *
     * @param string $name
     * @return void
     */
    function setName($name)
    {
    }
    /**
     * Updates the data
     *
     * The data argument is a readable stream resource.
     *
     * After a successful put operation, you may choose to return an ETag. The
     * etag must always be surrounded by double-quotes. These quotes must
     * appear in the actual string you're returning.
     *
     * Clients may use the ETag from a PUT request to later on make sure that
     * when they update the file, the contents haven't changed in the mean
     * time.
     *
     * If you don't plan to store the file byte-by-byte, and you return a
     * different object on a subsequent GET you are strongly recommended to not
     * return an ETag, and just return null.
     *
     * @param resource $data
     * @return string|null
     */
    function put($data)
    {
    }
    /**
     * Returns the data
     *
     * This method may either return a string or a readable stream resource
     *
     * @return mixed
     */
    function get()
    {
    }
    /**
     * Returns the ETag for a file
     *
     * An ETag is a unique identifier representing the current version of the file. If the file changes, the ETag MUST change.
     *
     * Return null if the ETag can not effectively be determined
     *
     * @return void
     */
    function getETag()
    {
    }
    /**
     * Returns the size of the node, in bytes
     *
     * @return int
     */
    function getSize()
    {
    }
    /**
     * Delete the node
     *
     * @return void
     */
    function delete()
    {
    }
    /**
     * Returns the last modification time as a unix timestamp.
     * If the information is not available, return null.
     *
     * @return int
     */
    function getLastModified()
    {
    }
}