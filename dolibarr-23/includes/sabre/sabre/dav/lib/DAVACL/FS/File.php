<?php

namespace Sabre\DAVACL\FS;

/**
 * This is an ACL-enabled file node.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends \Sabre\DAV\FSExt\File implements \Sabre\DAVACL\IACL
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
     * Constructor.
     *
     * @param string      $path  on-disk path
     * @param array       $acl   ACL rules
     * @param string|null $owner principal owner string
     */
    public function __construct($path, array $acl, $owner = null)
    {
    }
    /**
     * Returns the owner principal.
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    public function getOwner()
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
    public function getACL()
    {
    }
}