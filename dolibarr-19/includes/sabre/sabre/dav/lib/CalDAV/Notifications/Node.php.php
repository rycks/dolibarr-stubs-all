<?php

namespace Sabre\CalDAV\Notifications;

/**
 * This node represents a single notification.
 *
 * The signature is mostly identical to that of Sabre\DAV\IFile, but the get() method
 * MUST return an xml document that matches the requirements of the
 * 'caldav-notifications.txt' spec.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Node extends \Sabre\DAV\File implements \Sabre\CalDAV\Notifications\INode, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * The notification backend.
     *
     * @var CalDAV\Backend\NotificationSupport
     */
    protected $caldavBackend;
    /**
     * The actual notification.
     *
     * @var NotificationInterface
     */
    protected $notification;
    /**
     * Owner principal of the notification.
     *
     * @var string
     */
    protected $principalUri;
    /**
     * Constructor.
     *
     * @param string $principalUri
     */
    public function __construct(\Sabre\CalDAV\Backend\NotificationSupport $caldavBackend, $principalUri, \Sabre\CalDAV\Xml\Notification\NotificationInterface $notification)
    {
    }
    /**
     * Returns the path name for this notification.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Returns the etag for the notification.
     *
     * The etag must be surrounded by litteral double-quotes.
     *
     * @return string
     */
    public function getETag()
    {
    }
    /**
     * This method must return an xml element, using the
     * Sabre\CalDAV\Xml\Notification\NotificationInterface classes.
     *
     * @return NotificationInterface
     */
    public function getNotificationType()
    {
    }
    /**
     * Deletes this notification.
     */
    public function delete()
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
}