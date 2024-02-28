<?php

namespace Sabre\DAVACL\FS;

/**
 * This is an ACL-enabled collection.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Collection extends \Sabre\DAV\FSExt\Directory implements \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * A list of ACL rules.
     *
     * @var array
     */
    protected $acl;
    /**
     * Owner uri, or null for no owner.
     *
     * @var string|null
     */
    protected $owner;
    /**
     * Constructor
     *
     * @param string $path on-disk path.
     * @param array $acl ACL rules.
     * @param string|null $owner principal owner string.
     */
    function __construct($path, array $acl, $owner = null)
    {
    }
    /**
     * Returns a specific child node, referenced by its name
     *
     * This method must throw Sabre\DAV\Exception\NotFound if the node does not
     * exist.
     *
     * @param string $name
     * @throws NotFound
     * @return \Sabre\DAV\INode
     */
    function getChild($name)
    {
    }
    /**
     * Returns the owner principal
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    function getOwner()
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