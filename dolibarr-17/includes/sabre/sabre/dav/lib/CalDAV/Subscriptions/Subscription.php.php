<?php

namespace Sabre\CalDAV\Subscriptions;

/**
 * Subscription Node
 *
 * This node represents a subscription.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Subscription extends \Sabre\DAV\Collection implements \Sabre\CalDAV\Subscriptions\ISubscription, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * caldavBackend
     *
     * @var SubscriptionSupport
     */
    protected $caldavBackend;
    /**
     * subscriptionInfo
     *
     * @var array
     */
    protected $subscriptionInfo;
    /**
     * Constructor
     *
     * @param SubscriptionSupport $caldavBackend
     * @param array $subscriptionInfo
     */
    function __construct(\Sabre\CalDAV\Backend\SubscriptionSupport $caldavBackend, array $subscriptionInfo)
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
     * Returns the last modification time
     *
     * @return int
     */
    function getLastModified()
    {
    }
    /**
     * Deletes the current node
     *
     * @return void
     */
    function delete()
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
     * Updates properties on this node.
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * To update specific properties, call the 'handle' method on this object.
     * Read the PropPatch documentation for more information.
     *
     * @param PropPatch $propPatch
     * @return void
     */
    function propPatch(\Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * Returns a list of properties for this nodes.
     *
     * The properties list is a list of propertynames the client requested,
     * encoded in clark-notation {xmlnamespace}tagname.
     *
     * If the array is empty, it means 'all properties' were requested.
     *
     * Note that it's fine to liberally give properties back, instead of
     * conforming to the list of requested properties.
     * The Server class will filter out the extra.
     *
     * @param array $properties
     * @return array
     */
    function getProperties($properties)
    {
    }
    /**
     * Returns the owner principal.
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