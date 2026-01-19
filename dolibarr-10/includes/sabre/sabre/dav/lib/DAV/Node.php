<?php

namespace Sabre\DAV;

/**
 * Node class
 *
 * This is a helper class, that should aid in getting nodes setup.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Node implements \Sabre\DAV\INode
{
    /**
     * Returns the last modification time as a unix timestamp.
     *
     * If the information is not available, return null.
     *
     * @return int
     */
    function getLastModified()
    {
    }
    /**
     * Deletes the current node
     *
     * @throws Exception\Forbidden
     * @return void
     */
    function delete()
    {
    }
    /**
     * Renames the node
     *
     * @param string $name The new name
     * @throws Exception\Forbidden
     * @return void
     */
    function setName($name)
    {
    }
}