<?php

namespace Sabre\CalDAV\Xml\Request;

/**
 * Invite-reply POST request parser
 *
 * This class parses the invite-reply POST request, as defined in:
 *
 * http://svn.calendarserver.org/repository/calendarserver/CalendarServer/trunk/doc/Extensions/caldav-sharing.txt
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class InviteReply implements \Sabre\Xml\XmlDeserializable
{
    /**
     * The sharee calendar user address.
     *
     * This is the address that the original invite was set to
     *
     * @var string
     */
    public $href;
    /**
     * The uri to the calendar that was being shared.
     *
     * @var string
     */
    public $calendarUri;
    /**
     * The id of the invite message that's being responded to
     *
     * @var string
     */
    public $inReplyTo;
    /**
     * An optional message
     *
     * @var string
     */
    public $summary;
    /**
     * Either SharingPlugin::STATUS_ACCEPTED or SharingPlugin::STATUS_DECLINED.
     *
     * @var int
     */
    public $status;
    /**
     * Constructor
     *
     * @param string $href
     * @param string $calendarUri
     * @param string $inReplyTo
     * @param string $summary
     * @param int $status
     */
    function __construct($href, $calendarUri, $inReplyTo, $summary, $status)
    {
    }
    /**
     * The deserialize method is called during xml parsing.
     *
     * This method is called statically, this is because in theory this method
     * may be used as a type of constructor, or factory method.
     *
     * Often you want to return an instance of the current class, but you are
     * free to return other data as well.
     *
     * You are responsible for advancing the reader to the next element. Not
     * doing anything will result in a never-ending loop.
     *
     * If you just want to skip parsing for this element altogether, you can
     * just call $reader->next();
     *
     * $reader->parseInnerTree() will parse the entire sub-tree, and advance to
     * the next element.
     *
     * @param Reader $reader
     * @return mixed
     */
    static function xmlDeserialize(\Sabre\Xml\Reader $reader)
    {
    }
}