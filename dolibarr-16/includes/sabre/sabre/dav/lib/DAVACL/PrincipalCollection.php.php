<?php

namespace Sabre\DAVACL;

/**
 * Principals Collection
 *
 * This collection represents a list of users.
 * The users are instances of Sabre\DAVACL\Principal
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PrincipalCollection extends \Sabre\DAVACL\AbstractPrincipalCollection implements \Sabre\DAV\IExtendedCollection, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * This method returns a node for a principal.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     *
     * @param array $principal
     * @return \Sabre\DAV\INode
     */
    function getChildForPrincipal(array $principal)
    {
    }
    /**
     * Creates a new collection.
     *
     * This method will receive a MkCol object with all the information about
     * the new collection that's being created.
     *
     * The MkCol object contains information about the resourceType of the new
     * collection. If you don't support the specified resourceType, you should
     * throw Exception\InvalidResourceType.
     *
     * The object also contains a list of WebDAV properties for the new
     * collection.
     *
     * You should call the handle() method on this object to specify exactly
     * which properties you are storing. This allows the system to figure out
     * exactly which properties you didn't store, which in turn allows other
     * plugins (such as the propertystorage plugin) to handle storing the
     * property for you.
     *
     * @param string $name
     * @param MkCol $mkCol
     * @throws InvalidResourceType
     * @return void
     */
    function createExtendedCollection($name, \Sabre\DAV\MkCol $mkCol)
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