<?php

namespace Sabre\CalDAV\Xml\Notification;

/**
 * SystemStatus notification.
 *
 * This notification can be used to indicate to the user that the system is
 * down.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SystemStatus implements \Sabre\CalDAV\Xml\Notification\NotificationInterface
{
    const TYPE_LOW = 1;
    const TYPE_MEDIUM = 2;
    const TYPE_HIGH = 3;
    /**
     * A unique id.
     *
     * @var string
     */
    protected $id;
    /**
     * The type of alert. This should be one of the TYPE_ constants.
     *
     * @var int
     */
    protected $type;
    /**
     * A human-readable description of the problem.
     *
     * @var string
     */
    protected $description;
    /**
     * A url to a website with more information for the user.
     *
     * @var string
     */
    protected $href;
    /**
     * Notification Etag.
     *
     * @var string
     */
    protected $etag;
    /**
     * Creates the notification.
     *
     * Some kind of unique id should be provided. This is used to generate a
     * url.
     *
     * @param string $id
     * @param string $etag
     * @param int    $type
     * @param string $description
     * @param string $href
     */
    public function __construct($id, $etag, $type = self::TYPE_HIGH, $description = null, $href = null)
    {
    }
    /**
     * The serialize method is called during xml writing.
     *
     * It should use the $writer argument to encode this object into XML.
     *
     * Important note: it is not needed to create the parent element. The
     * parent element is already created, and we only have to worry about
     * attributes, child elements and text (if any).
     *
     * Important note 2: If you are writing any new elements, you are also
     * responsible for closing them.
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer)
    {
    }
    /**
     * This method serializes the entire notification, as it is used in the
     * response body.
     */
    public function xmlSerializeFull(\Sabre\Xml\Writer $writer)
    {
    }
    /**
     * Returns a unique id for this notification.
     *
     * This is just the base url. This should generally be some kind of unique
     * id.
     *
     * @return string
     */
    public function getId()
    {
    }
    /*
     * Returns the ETag for this notification.
     *
     * The ETag must be surrounded by literal double-quotes.
     *
     * @return string
     */
    public function getETag()
    {
    }
}