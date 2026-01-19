<?php

namespace Sabre\CalDAV\Schedule;

/**
 * The SchedulingObject represents a scheduling object in the Inbox collection.
 *
 * @author Brett (https://github.com/bretten)
 * @license http://sabre.io/license/ Modified BSD License
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 */
class SchedulingObject extends \Sabre\CalDAV\CalendarObject implements \Sabre\CalDAV\Schedule\ISchedulingObject
{
    /**
     * Constructor.
     *
     * The following properties may be passed within $objectData:
     *
     *   * uri - A unique uri. Only the 'basename' must be passed.
     *   * principaluri - the principal that owns the object.
     *   * calendardata (optional) - The iCalendar data
     *   * etag - (optional) The etag for this object, MUST be encloded with
     *            double-quotes.
     *   * size - (optional) The size of the data in bytes.
     *   * lastmodified - (optional) format as a unix timestamp.
     *   * acl - (optional) Use this to override the default ACL for the node.
     */
    public function __construct(\Sabre\CalDAV\Backend\SchedulingSupport $caldavBackend, array $objectData)
    {
    }
    /**
     * Returns the ICalendar-formatted object.
     *
     * @return string
     */
    public function get()
    {
    }
    /**
     * Updates the ICalendar-formatted object.
     *
     * @param string|resource $calendarData
     *
     * @return string
     */
    public function put($calendarData)
    {
    }
    /**
     * Deletes the scheduling message.
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
    public function getACL()
    {
    }
}