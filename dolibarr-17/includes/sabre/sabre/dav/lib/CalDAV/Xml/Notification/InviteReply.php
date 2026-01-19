<?php

namespace Sabre\CalDAV\Xml\Notification;

/**
 * This class represents the cs:invite-reply notification element.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class InviteReply implements \Sabre\CalDAV\Xml\Notification\NotificationInterface
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
     * The unique id of the notification this was a reply to.
     *
     * @var string
     */
    protected $inReplyTo;
    /**
     * A url to the recipient of the original (!) notification.
     *
     * @var string
     */
    protected $href;
    /**
     * The type of message, see the SharingPlugin::STATUS_ constants.
     *
     * @var int
     */
    protected $type;
    /**
     * A url to the shared calendar.
     *
     * @var string
     */
    protected $hostUrl;
    /**
     * A description of the share request
     *
     * @var string
     */
    protected $summary;
    /**
     * Notification Etag
     *
     * @var string
     */
    protected $etag;
    /**
     * Creates the Invite Reply Notification.
     *
     * This constructor receives an array with the following elements:
     *
     *   * id           - A unique id
     *   * etag         - The etag
     *   * dtStamp      - A DateTime object with a timestamp for the notification.
     *   * inReplyTo    - This should refer to the 'id' of the notification
     *                    this is a reply to.
     *   * type         - The type of notification, see SharingPlugin::STATUS_*
     *                    constants for details.
     *   * hostUrl      - A url to the shared calendar.
     *   * summary      - Description of the share, can be the same as the
     *                    calendar, but may also be modified (optional).
     *
     * @param array $values
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