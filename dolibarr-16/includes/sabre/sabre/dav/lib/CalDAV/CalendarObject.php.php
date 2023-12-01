<?php

namespace Sabre\CalDAV;

/**
 * The CalendarObject represents a single VEVENT or VTODO within a Calendar.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CalendarObject extends \Sabre\DAV\File implements \Sabre\CalDAV\ICalendarObject, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * Sabre\CalDAV\Backend\BackendInterface
     *
     * @var Backend\AbstractBackend
     */
    protected $caldavBackend;
    /**
     * Array with information about this CalendarObject
     *
     * @var array
     */
    protected $objectData;
    /**
     * Array with information about the containing calendar
     *
     * @var array
     */
    protected $calendarInfo;
    /**
     * Constructor
     *
     * The following properties may be passed within $objectData:
     *
     *   * calendarid - This must refer to a calendarid from a caldavBackend
     *   * uri - A unique uri. Only the 'basename' must be passed.
     *   * calendardata (optional) - The iCalendar data
     *   * etag - (optional) The etag for this object, MUST be encloded with
     *            double-quotes.
     *   * size - (optional) The size of the data in bytes.
     *   * lastmodified - (optional) format as a unix timestamp.
     *   * acl - (optional) Use this to override the default ACL for the node.
     *
     * @param Backend\BackendInterface $caldavBackend
     * @param array $calendarInfo
     * @param array $objectData
     */
    function __construct(\Sabre\CalDAV\Backend\BackendInterface $caldavBackend, array $calendarInfo, array $objectData)
    {
    }
    /**
     * Returns the uri for this object
     *
     * @return string
     */
    function getName()
    {
    }
    /**
     * Returns the ICalendar-formatted object
     *
     * @return string
     */
    function get()
    {
    }
    /**
     * Updates the ICalendar-formatted object
     *
     * @param string|resource $calendarData
     * @return string
     */
    function put($calendarData)
    {
    }
    /**
     * Deletes the calendar object
     *
     * @return void
     */
    function delete()
    {
    }
    /**
     * Returns the mime content-type
     *
     * @return string
     */
    function getContentType()
    {
    }
    /**
     * Returns an ETag for this object.
     *
     * The ETag is an arbitrary string, but MUST be surrounded by double-quotes.
     *
     * @return string
     */
    function getETag()
    {
    }
    /**
     * Returns the last modification date as a unix timestamp
     *
     * @return int
     */
    function getLastModified()
    {
    }
    /**
     * Returns the size of this object in bytes
     *
     * @return int
     */
    function getSize()
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