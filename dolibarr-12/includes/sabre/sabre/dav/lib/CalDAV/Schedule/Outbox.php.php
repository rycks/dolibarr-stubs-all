<?php

namespace Sabre\CalDAV\Schedule;

/**
 * The CalDAV scheduling outbox
 *
 * The outbox is mainly used as an endpoint in the tree for a client to do
 * free-busy requests. This functionality is completely handled by the
 * Scheduling plugin, so this object is actually mostly static.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Outbox extends \Sabre\DAV\Collection implements \Sabre\CalDAV\Schedule\IOutbox
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * The principal Uri
     *
     * @var string
     */
    protected $principalUri;
    /**
     * Constructor
     *
     * @param string $principalUri
     */
    function __construct($principalUri)
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
     * Returns an array with all the child nodes
     *
     * @return \Sabre\DAV\INode[]
     */
    function getChildren()
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