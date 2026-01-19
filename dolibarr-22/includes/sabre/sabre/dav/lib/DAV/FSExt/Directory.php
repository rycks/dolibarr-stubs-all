<?php

namespace Sabre\DAV\FSExt;

/**
 * Directory class.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Directory extends \Sabre\DAV\FS\Node implements \Sabre\DAV\ICollection, \Sabre\DAV\IQuota, \Sabre\DAV\IMoveTarget
{
    /**
     * Creates a new file in the directory.
     *
     * Data will either be supplied as a stream resource, or in certain cases
     * as a string. Keep in mind that you may have to support either.
     *
     * After successful creation of the file, you may choose to return the ETag
     * of the new file here.
     *
     * The returned ETag must be surrounded by double-quotes (The quotes should
     * be part of the actual string).
     *
     * If you cannot accurately determine the ETag, you should not return it.
     * If you don't store the file exactly as-is (you're transforming it
     * somehow) you should also not return an ETag.
     *
     * This means that if a subsequent GET to this new file does not exactly
     * return the same contents of what was submitted here, you are strongly
     * recommended to omit the ETag.
     *
     * @param string          $name Name of the file
     * @param resource|string $data Initial payload
     *
     * @return string|null
     */
    public function createFile($name, $data = null)
    {
    }
    /**
     * Creates a new subdirectory.
     *
     * @param string $name
     */
    public function createDirectory($name)
    {
    }
    /**
     * Returns a specific child node, referenced by its name.
     *
     * This method must throw Sabre\DAV\Exception\NotFound if the node does not
     * exist.
     *
     * @param string $name
     *
     * @throws DAV\Exception\NotFound
     *
     * @return DAV\INode
     */
    public function getChild($name)
    {
    }
    /**
     * Checks if a child exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function childExists($name)
    {
    }
    /**
     * Returns an array with all the child nodes.
     *
     * @return DAV\INode[]
     */
    public function getChildren()
    {
    }
    /**
     * Deletes all files in this directory, and then itself.
     *
     * @return bool
     */
    public function delete()
    {
    }
    /**
     * Returns available diskspace information.
     *
     * @return array
     */
    public function getQuotaInfo()
    {
    }
    /**
     * Moves a node into this collection.
     *
     * It is up to the implementors to:
     *   1. Create the new resource.
     *   2. Remove the old resource.
     *   3. Transfer any properties or other data.
     *
     * Generally you should make very sure that your collection can easily move
     * the move.
     *
     * If you don't, just return false, which will trigger sabre/dav to handle
     * the move itself. If you return true from this function, the assumption
     * is that the move was successful.
     *
     * @param string    $targetName new local file/collection name
     * @param string    $sourcePath Full path to source node
     * @param DAV\INode $sourceNode Source node itself
     *
     * @return bool
     */
    public function moveInto($targetName, $sourcePath, \Sabre\DAV\INode $sourceNode)
    {
    }
}