<?php

namespace Sabre\CalDAV\Xml\Notification;

/**
 * This class represents the cs:invite-notification notification element.
 *
 * This element is defined here:
 * http://svn.calendarserver.org/repository/calendarserver/CalendarServer/trunk/doc/Extensions/caldav-sharing.txt
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Invite implements \Sabre\CalDAV\Xml\Notification\NotificationInterface
{
    /**
     * A unique id for the message
     *
     * @var string
     */
    protected $id;
    /**
     * Timestamp of the notification
     *
     * @var DateTime
     */
    protected $dtStamp;
    /**
     * A url to the recipient of the notification. This can be an email
     * address (mailto:), or a principal url.
     *
     * @var string
     */
    protected $href;
    /**
     * The type of message, see the SharingPlugin::STATUS_* constants.
     *
     * @var int
     */
    protected $type;
    /**
     * True if access to a calendar is read-only.
     *
     * @var bool
     */
    protected $readOnly;
    /**
     * A url to the shared calendar.
     *
     * @var string
     */
    protected $hostUrl;
    /**
     * Url to the sharer of the calendar
     *
     * @var string
     */
    protected $organizer;
    /**
     * The name of the sharer.
     *
     * @var string
     */
    protected $commonName;
    /**
     * The name of the sharer.
     *
     * @var string
     */
    protected $firstName;
    /**
     * The name of the sharer.
     *
     * @var string
     */
    protected $lastName;
    /**
     * A description of the share request
     *
     * @var string
     */
    protected $summary;
    /**
     * The Etag for the notification
     *
     * @var string
     */
    protected $etag;
    /**
     * The list of supported components
     *
     * @var CalDAV\Xml\Property\SupportedCalendarComponentSet
     */
    protected $supportedComponents;
    /**
     * Creates the Invite notification.
     *
     * This constructor receives an array with the following elements:
     *
     *   * id           - A unique id
     *   * etag         - The etag
     *   * dtStamp      - A DateTime object with a timestamp for the notification.
     *   * type         - The type of notification, see SharingPlugin::STATUS_*
     *                    constants for details.
     *   * readOnly     - This must be set to true, if this is an invite for
     *                    read-only access to a calendar.
     *   * hostUrl      - A url to the shared calendar.
     *   * organizer    - Url to the sharer principal.
     *   * commonName   - The real name of the sharer (optional).
     *   * firstName    - The first name of the sharer (optional).
     *   * lastName     - The last name of the sharer (optional).
     *   * summary      - Description of the share, can be the same as the
     *                    calendar, but may also be modified (optional).
     *   * supportedComponents - An instance of
     *                    Sabre\CalDAV\Property\SupportedCalendarComponentSet.
     *                    This allows the client to determine which components
     *                    will be supported in the shared calendar. This is
     *                    also optional.
     *
     * @param array $values All the options
     */
    function __construct(array $values)
    {
    }
    /**
     * The xmlSerialize method is called during xml writing.
     *
     * Use the $writer argument to write its own xml serialization.
     *
     * An important note: do _not_ create a parent element. Any element
     * implementing XmlSerializable should only ever write what's considered
     * its 'inner xml'.
     *
     * The parent of the current element is responsible for writing a
     * containing element.
     *
     * This allows serializers to be re-used for different element names.
     *
     * If you are opening new elements, you must also close them again.
     *
     * @param Writer $writer
     * @return void
     */
    function xmlSerialize(\Sabre\Xml\Writer $writer)
    {
    }
    /**
     * This method serializes the entire notification, as it is used in the
     * response body.
     *
     * @param Writer $writer
     * @return void
     */
    function xmlSerializeFull(\Sabre\Xml\Writer $writer)
    {
    }
    /**
     * Returns a unique id for this notification
     *
     * This is just the base url. This should generally be some kind of unique
     * id.
     *
     * @return string
     */
    function getId()
    {
    }
    /**
     * Returns the ETag for this notification.
     *
     * The ETag must be surrounded by literal double-quotes.
     *
     * @return string
     */
    function getETag()
    {
    }
}