<?php

namespace Sabre\DAV\FS;

/**
 * Base node-class.
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
     * The path to the current node.
     *
     * @var string
     */
    protected $path;
    /**
     * The overridden name of the node.
     *
     * @var string
     */
    protected $overrideName;
    /**
     * Sets up the node, expects a full path name.
     *
     * If $overrideName is set, this node shows up in the tree under a
     * different name. In this case setName() will be disabled.
     *
     * @param string $path
     * @param string $overrideName
     */
    public function __construct($path, $overrideName = null)
    {
    }
    /**
     * Returns the name of the node.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Renames the node.
     *
     * @param string $name The new name
     */
    public function setName($name)
    {
    }
    /**
     * Returns the last modification time, as a unix timestamp.
     *
     * @return int
     */
    public function getLastModified()
    {
    }
}