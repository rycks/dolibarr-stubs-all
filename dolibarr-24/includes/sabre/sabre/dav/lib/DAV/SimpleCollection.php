<?php

namespace Sabre\DAV;

/**
 * SimpleCollection.
 *
 * The SimpleCollection is used to quickly setup static directory structures.
 * Just create the object with a proper name, and add children to use it.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SimpleCollection extends \Sabre\DAV\Collection
{
    /**
     * List of childnodes.
     *
     * @var INode[]
     */
    protected $children = [];
    /**
     * Name of this resource.
     *
     * @var string
     */
    protected $name;
    /**
     * Creates this node.
     *
     * The name of the node must be passed, child nodes can also be passed.
     * This nodes must be instances of INode
     *
     * @param string  $name
     * @param INode[] $children
     */
    public function __construct($name, array $children = [])
    {
    }
    /**
     * Adds a new childnode to this collection.
     */
    public function addChild(\Sabre\DAV\INode $child)
    {
    }
    /**
     * Returns the name of the collection.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Returns a child object, by its name.
     *
     * This method makes use of the getChildren method to grab all the child nodes, and compares the name.
     * Generally its wise to override this, as this can usually be optimized
     *
     * This method must throw Sabre\DAV\Exception\NotFound if the node does not
     * exist.
     *
     * @param string $name
     *
     * @throws Exception\NotFound
     *
     * @return INode
     */
    public function getChild($name)
    {
    }
    /**
     * Returns a list of children for this collection.
     *
     * @return INode[]
     */
    public function getChildren()
    {
    }
}