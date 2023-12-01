<?php

namespace Sabre\CalDAV\Xml\Notification;

/**
 * This interface reflects a single notification type.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface NotificationInterface extends \Sabre\Xml\XmlSerializable
{
    /**
     * This method serializes the entire notification, as it is used in the
     * response body.
     *
     * @param Writer $writer
     * @return void
     */
    function xmlSerializeFull(\Sabre\Xml\Writer $writer);
    /**
     * Returns a unique id for this notification
     *
     * This is just the base url. This should generally be some kind of unique
     * id.
     *
     * @return string
     */
    function getId();
    /**
     * Returns the ETag for this notification.
     *
     * The ETag must be surrounded by literal double-quotes.
     *
     * @return string
     */
    function getETag();
}