<?php

namespace Sabre\CalDAV;

/**
 * The CalendarHome represents a node that is usually in a users'
 * calendar-homeset.
 *
 * It contains all the users' calendars, and can optionally contain a
 * notifications collection, calendar subscriptions, a users' inbox, and a
 * users' outbox.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CalendarHome implements \Sabre\DAV\IExtendedCollection, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * CalDAV backend.
     *
     * @var Backend\BackendInterface
     */
    protected $caldavBackend;
    /**
     * Principal information.
     *
     * @var array
     */
    protected $principalInfo;
    /**
     * Constructor.
     *
     * @param array $principalInfo
     */
    public function __construct(\Sabre\CalDAV\Backend\BackendInterface $caldavBackend, $principalInfo)
    {
    }
    /**
     * Returns the name of this object.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Updates the name of this object.
     *
     * @param string $name
     */
    public function setName($name)
    {
    }
    /**
     * Deletes this object.
     */
    public function delete()
    {
    }
    /**
     * Returns the last modification date.
     *
     * @return int
     */
    public function getLastModified()
    {
    }
    /**
     * Creates a new file under this object.
     *
     * This is currently not allowed
     *
     * @param string   $filename
     * @param resource $data
     */
    public function createFile($filename, $data = null)
    {
    }
    /**
     * Creates a new directory under this object.
     *
     * This is currently not allowed.
     *
     * @param string $filename
     */
    public function createDirectory($filename)
    {
    }
    /**
     * Returns a single calendar, by name.
     *
     * @param string $name
     *
     * @return Calendar
     */
    public function getChild($name)
    {
    }
    /**
     * Checks if a calendar exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function childExists($name)
    {
    }
    /**
     * Returns a list of calendars.
     *
     * @return array
     */
    public function getChildren()
    {
    }
    /**
     * Creates a new calendar or subscription.
     *
     * @param string $name
     *
     * @throws DAV\Exception\InvalidResourceType
     */
    public function createExtendedCollection($name, \Sabre\DAV\MkCol $mkCol)
    {
    }
    /**
     * Returns the owner of the calendar home.
     *
     * @return string
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
    /**
     * This method is called when a user replied to a request to share.
     *
     * This method should return the url of the newly created calendar if the
     * share was accepted.
     *
     * @param string $href        The sharee who is replying (often a mailto: address)
     * @param int    $status      One of the SharingPlugin::STATUS_* constants
     * @param string $calendarUri The url to the calendar thats being shared
     * @param string $inReplyTo   The unique id this message is a response to
     * @param string $summary     A description of the reply
     *
     * @return string|null
     */
    public function shareReply($href, $status, $calendarUri, $inReplyTo, $summary = null)
    {
    }
    /**
     * Searches through all of a users calendars and calendar objects to find
     * an object with a specific UID.
     *
     * This method should return the path to this object, relative to the
     * calendar home, so this path usually only contains two parts:
     *
     * calendarpath/objectpath.ics
     *
     * If the uid is not found, return null.
     *
     * This method should only consider * objects that the principal owns, so
     * any calendars owned by other principals that also appear in this
     * collection should be ignored.
     *
     * @param string $uid
     *
     * @return string|null
     */
    public function getCalendarObjectByUID($uid)
    {
    }
}