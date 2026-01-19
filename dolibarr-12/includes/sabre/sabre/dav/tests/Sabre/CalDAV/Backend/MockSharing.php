<?php

namespace Sabre\CalDAV\Backend;

class MockSharing extends \Sabre\CalDAV\Backend\Mock implements \Sabre\CalDAV\Backend\NotificationSupport, \Sabre\CalDAV\Backend\SharingSupport
{
    private $shares = [];
    private $notifications;
    function __construct(array $calendars = [], array $calendarData = [], array $notifications = [])
    {
    }
    /**
     * Returns a list of calendars for a principal.
     *
     * Every project is an array with the following keys:
     *  * id, a unique id that will be used by other functions to modify the
     *    calendar. This can be the same as the uri or a database key.
     *  * uri, which the basename of the uri with which the calendar is
     *    accessed.
     *  * principalUri. The owner of the calendar. Almost always the same as
     *    principalUri passed to this method.
     *
     * Furthermore it can contain webdav properties in clark notation. A very
     * common one is '{DAV:}displayname'.
     *
     * @param string $principalUri
     * @return array
     */
    function getCalendarsForUser($principalUri)
    {
    }
    /**
     * Returns a list of notifications for a given principal url.
     *
     * The returned array should only consist of implementations of
     * Sabre\CalDAV\Notifications\INotificationType.
     *
     * @param string $principalUri
     * @return array
     */
    function getNotificationsForPrincipal($principalUri)
    {
    }
    /**
     * This deletes a specific notifcation.
     *
     * This may be called by a client once it deems a notification handled.
     *
     * @param string $principalUri
     * @param NotificationInterface $notification
     * @return void
     */
    function deleteNotification($principalUri, \Sabre\CalDAV\Xml\Notification\NotificationInterface $notification)
    {
    }
    /**
     * Updates the list of shares.
     *
     * @param mixed $calendarId
     * @param \Sabre\DAV\Xml\Element\Sharee[] $sharees
     * @return void
     */
    function updateInvites($calendarId, array $sharees)
    {
    }
    /**
     * Returns the list of people whom this calendar is shared with.
     *
     * Every item in the returned list must be a Sharee object with at
     * least the following properties set:
     *   $href
     *   $shareAccess
     *   $inviteStatus
     *
     * and optionally:
     *   $properties
     *
     * @param mixed $calendarId
     * @return \Sabre\DAV\Xml\Element\Sharee[]
     */
    function getInvites($calendarId)
    {
    }
    /**
     * This method is called when a user replied to a request to share.
     *
     * @param string href The sharee who is replying (often a mailto: address)
     * @param int status One of the \Sabre\DAV\Sharing\Plugin::INVITE_* constants
     * @param string $calendarUri The url to the calendar thats being shared
     * @param string $inReplyTo The unique id this message is a response to
     * @param string $summary A description of the reply
     * @return void
     */
    function shareReply($href, $status, $calendarUri, $inReplyTo, $summary = null)
    {
    }
    /**
     * Publishes a calendar
     *
     * @param mixed $calendarId
     * @param bool $value
     * @return void
     */
    function setPublishStatus($calendarId, $value)
    {
    }
}