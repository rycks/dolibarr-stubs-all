<?php

namespace Sabre\DAV\FS;

/**
 * Base node-class
 *
 * The node class implements the method used by both the File and the Directory classes
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Node implements \Sabre\DAV\INode
{
    /**
     * The path to the current node
     *
     * @var string
     */
    protected $path;
    /**
     * Sets up the node, expects a full path name
     *
     * @param string $path
     */
    function __construct($path)
    {
    }
    /**
     * Returns the name of the node
     *
     * @return string
     */
    function getName()
    {
    }
    /**
     * Renames the node
     *
     * @param string $name The new name
     * @return void
     */
    function setName($name)
    {
    }
    /**
     * Returns the last modification time, as a unix timestamp
     *
     * @return int
     */
    function getLastModified()
    {
    }
}