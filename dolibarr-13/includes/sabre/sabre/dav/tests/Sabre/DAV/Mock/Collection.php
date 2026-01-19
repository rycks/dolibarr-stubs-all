<?php

namespace Sabre\DAV\Mock;

/**
 * Mock Collection.
 *
 * This collection quickly allows you to create trees of nodes.
 * Children are specified as an array.
 *
 * Every key a filename, every array value is either:
 *   * an array, for a sub-collection
 *   * a string, for a file
 *   * An instance of \Sabre\DAV\INode.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Collection extends \Sabre\DAV\Collection
{
    protected $name;
    protected $children;
    protected $parent;
    /**
     * Creates the object
     *
     * @param string $name
     * @param array $children
     * @param Collection $parent
     * @return void
     */
    function __construct($name, array $children = [], \Sabre\DAV\Mock\Collection $parent = null)
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
     * Creates a new file in the directory
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
     * @param string $name Name of the file
     * @param resource|string $data Initial payload
     * @return null|string
     */
    function createFile($name, $data = null)
    {
    }
    /**
     * Creates a new subdirectory
     *
     * @param string $name
     * @return void
     */
    function createDirectory($name)
    {
    }
    /**
     * Returns an array with all the child nodes
     *
     * @return \Sabre\DAV\INode[]
     */
    function getChildren()
    {
    }
    /**
     * Adds an already existing node to this collection.
     *
     * @param \Sabre\DAV\INode $node
     */
    function addNode(\Sabre\DAV\INode $node)
    {
    }
    /**
     * Removes a childnode from this node.
     *
     * @param string $name
     * @return void
     */
    function deleteChild($name)
    {
    }
    /**
     * Deletes this collection and all its children,.
     *
     * @return void
     */
    function delete()
    {
    }
}