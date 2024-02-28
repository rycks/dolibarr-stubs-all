<?php

namespace Sabre\CalDAV\Notifications;

/**
 * This node represents a list of notifications.
 *
 * It provides no additional functionality, but you must implement this
 * interface to allow the Notifications plugin to mark the collection
 * as a notifications collection.
 *
 * This collection should only return Sabre\CalDAV\Notifications\INode nodes as
 * its children.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Collection extends \Sabre\DAV\Collection implements \Sabre\CalDAV\Notifications\ICollection, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * The notification backend
     *
     * @var CalDAV\Backend\NotificationSupport
     */
    protected $caldavBackend;
    /**
     * Principal uri
     *
     * @var string
     */
    protected $principalUri;
    /**
     * Constructor
     *
     * @param CalDAV\Backend\NotificationSupport $caldavBackend
     * @param string $principalUri
     */
    function __construct(\Sabre\CalDAV\Backend\NotificationSupport $caldavBackend, $principalUri)
    {
    }
    /**
     * Returns all notifications for a principal
     *
     * @return array
     */
    function getChildren()
    {
    }
    /**
     * Returns the name of this object
     *
     * @return string
     */
    function getName()
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
}