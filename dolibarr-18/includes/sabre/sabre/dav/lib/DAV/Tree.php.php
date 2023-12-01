<?php

namespace Sabre\DAV;

/**
 * The tree object is responsible for basic tree operations.
 *
 * It allows for fetching nodes by path, facilitates deleting, copying and
 * moving.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Tree
{
    /**
     * The root node.
     *
     * @var ICollection
     */
    protected $rootNode;
    /**
     * This is the node cache. Accessed nodes are stored here.
     * Arrays keys are path names, values are the actual nodes.
     *
     * @var array
     */
    protected $cache = [];
    /**
     * Creates the object.
     *
     * This method expects the rootObject to be passed as a parameter
     */
    public function __construct(\Sabre\DAV\ICollection $rootNode)
    {
    }
    /**
     * Returns the INode object for the requested path.
     *
     * @param string $path
     *
     * @return INode
     */
    public function getNodeForPath($path)
    {
    }
    /**
     * This function allows you to check if a node exists.
     *
     * Implementors of this class should override this method to make
     * it cheaper.
     *
     * @param string $path
     *
     * @return bool
     */
    public function nodeExists($path)
    {
    }
    /**
     * Copies a file from path to another.
     *
     * @param string $sourcePath      The source location
     * @param string $destinationPath The full destination path
     */
    public function copy($sourcePath, $destinationPath)
    {
    }
    /**
     * Moves a file from one location to another.
     *
     * @param string $sourcePath      The path to the file which should be moved
     * @param string $destinationPath The full destination path, so not just the destination parent node
     */
    public function move($sourcePath, $destinationPath)
    {
    }
    /**
     * Deletes a node from the tree.
     *
     * @param string $path
     */
    public function delete($path)
    {
    }
    /**
     * Returns a list of childnodes for a given path.
     *
     * @param string $path
     *
     * @return \Traversable
     */
    public function getChildren($path)
    {
    }
    /**
     * This method is called with every tree update.
     *
     * Examples of tree updates are:
     *   * node deletions
     *   * node creations
     *   * copy
     *   * move
     *   * renaming nodes
     *
     * If Tree classes implement a form of caching, this will allow
     * them to make sure caches will be expired.
     *
     * If a path is passed, it is assumed that the entire subtree is dirty
     *
     * @param string $path
     */
    public function markDirty($path)
    {
    }
    /**
     * This method tells the tree system to pre-fetch and cache a list of
     * children of a single parent.
     *
     * There are a bunch of operations in the WebDAV stack that request many
     * children (based on uris), and sometimes fetching many at once can
     * optimize this.
     *
     * This method returns an array with the found nodes. It's keys are the
     * original paths. The result may be out of order.
     *
     * @param array $paths list of nodes that must be fetched
     *
     * @return array
     */
    public function getMultipleNodes($paths)
    {
    }
    /**
     * copyNode.
     *
     * @param string $destinationName
     */
    protected function copyNode(\Sabre\DAV\INode $source, \Sabre\DAV\ICollection $destinationParent, $destinationName = null)
    {
    }
}