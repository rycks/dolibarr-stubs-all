<?php

namespace Sabre\CalDAV\Principal;

/**
 * CalDAV principal
 *
 * This is a standard user-principal for CalDAV. This principal is also a
 * collection and returns the caldav-proxy-read and caldav-proxy-write child
 * principals.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class User extends \Sabre\DAVACL\Principal implements \Sabre\DAV\ICollection
{
    /**
     * Creates a new file in the directory
     *
     * @param string $name Name of the file
     * @param resource $data Initial payload, passed as a readable stream resource.
     * @throws DAV\Exception\Forbidden
     * @return void
     */
    function createFile($name, $data = null)
    {
    }
    /**
     * Creates a new subdirectory
     *
     * @param string $name
     * @throws DAV\Exception\Forbidden
     * @return void
     */
    function createDirectory($name)
    {
    }
    /**
     * Returns a specific child node, referenced by its name
     *
     * @param string $name
     * @return DAV\INode
     */
    function getChild($name)
    {
    }
    /**
     * Returns an array with all the child nodes
     *
     * @return DAV\INode[]
     */
    function getChildren()
    {
    }
    /**
     * Returns whether or not the child node exists
     *
     * @param string $name
     * @return bool
     */
    function childExists($name)
    {
    }
    /**
     * Returns a list of ACE's for this node.
     *
     * Each ACE has the following properties:
     *   * 'privilege', a string such as {DAV:}read or {DAV:}write. These are
     *     currently the only supported privileges
     *   * 'principal', a url to the principal who owns the node
     *   * 'protected' (optional), indicating that this ACE is not allowed to
     *      be updated.
     *
     * @return array
     */
    function getACL()
    {
    }
}