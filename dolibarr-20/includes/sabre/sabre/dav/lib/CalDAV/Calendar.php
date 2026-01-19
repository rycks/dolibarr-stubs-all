<?php

namespace Sabre\CalDAV;

/**
 * This object represents a CalDAV calendar.
 *
 * A calendar can contain multiple TODO and or Events. These are represented
 * as \Sabre\CalDAV\CalendarObject objects.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Calendar implements \Sabre\CalDAV\ICalendar, \Sabre\DAV\IProperties, \Sabre\DAV\Sync\ISyncCollection, \Sabre\DAV\IMultiGet
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * This is an array with calendar information.
     *
     * @var array
     */
    protected $calendarInfo;
    /**
     * CalDAV backend.
     *
     * @var Backend\BackendInterface
     */
    protected $caldavBackend;
    /**
     * Constructor.
     *
     * @param array $calendarInfo
     */
    public function __construct(\Sabre\CalDAV\Backend\BackendInterface $caldavBackend, $calendarInfo)
    {
    }
    /**
     * Returns the name of the calendar.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Updates properties on this node.
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * To update specific properties, call the 'handle' method on this object.
     * Read the PropPatch documentation for more information.
     */
    public function propPatch(\Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * Returns the list of properties.
     *
     * @param array $requestedProperties
     *
     * @return array
     */
    public function getProperties($requestedProperties)
    {
    }
    /**
     * Returns a calendar object.
     *
     * The contained calendar objects are for example Events or Todo's.
     *
     * @param string $name
     *
     * @return \Sabre\CalDAV\ICalendarObject
     */
    public function getChild($name)
    {
    }
    /**
     * Returns the full list of calendar objects.
     *
     * @return array
     */
    public function getChildren()
    {
    }
    /**
     * This method receives a list of paths in it's first argument.
     * It must return an array with Node objects.
     *
     * If any children are not found, you do not have to return them.
     *
     * @param string[] $paths
     *
     * @return array
     */
    public function getMultipleChildren(array $paths)
    {
    }
    /**
     * Checks if a child-node exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function childExists($name)
    {
    }
    /**
     * Creates a new directory.
     *
     * We actually block this, as subdirectories are not allowed in calendars.
     *
     * @param string $name
     */
    public function createDirectory($name)
    {
    }
    /**
     * Creates a new file.
     *
     * The contents of the new file must be a valid ICalendar string.
     *
     * @param string   $name
     * @param resource $data
     *
     * @return string|null
     */
    public function createFile($name, $data = null)
    {
    }
    /**
     * Deletes the calendar.
     */
    public function delete()
    {
    }
    /**
     * Renames the calendar. Note that most calendars use the
     * {DAV:}displayname to display a name to display a name.
     *
     * @param string $newName
     */
    public function setName($newName)
    {
    }
    /**
     * Returns the last modification date as a unix timestamp.
     */
    public function getLastModified()
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
    /**
     * This method returns the ACL's for calendar objects in this calendar.
     * The result of this method automatically gets passed to the
     * calendar-object nodes in the calendar.
     *
     * @return array
     */
    public function getChildACL()
    {
    }
    /**
     * Performs a calendar-query on the contents of this calendar.
     *
     * The calendar-query is defined in RFC4791 : CalDAV. Using the
     * calendar-query it is possible for a client to request a specific set of
     * object, based on contents of iCalendar properties, date-ranges and
     * iCalendar component types (VTODO, VEVENT).
     *
     * This method should just return a list of (relative) urls that match this
     * query.
     *
     * The list of filters are specified as an array. The exact array is
     * documented by Sabre\CalDAV\CalendarQueryParser.
     *
     * @return array
     */
    public function calendarQuery(array $filters)
    {
    }
    /**
     * This method returns the current sync-token for this collection.
     * This can be any string.
     *
     * If null is returned from this function, the plugin assumes there's no
     * sync information available.
     *
     * @return string|null
     */
    public function getSyncToken()
    {
    }
    /**
     * The getChanges method returns all the changes that have happened, since
     * the specified syncToken and the current collection.
     *
     * This function should return an array, such as the following:
     *
     * [
     *   'syncToken' => 'The current synctoken',
     *   'added'   => [
     *      'new.txt',
     *   ],
     *   'modified'   => [
     *      'modified.txt',
     *   ],
     *   'deleted' => [
     *      'foo.php.bak',
     *      'old.txt'
     *   ],
     *   'result_truncated' : true
     * ];
     *
     * The syncToken property should reflect the *current* syncToken of the
     * collection, as reported getSyncToken(). This is needed here too, to
     * ensure the operation is atomic.
     *
     * If the syncToken is specified as null, this is an initial sync, and all
     * members should be reported.
     *
     * If result is truncated due to server limitation or limit by client,
     * set result_truncated to true, otherwise set to false or do not add the key.
     *
     * The modified property is an array of nodenames that have changed since
     * the last token.
     *
     * The deleted property is an array with nodenames, that have been deleted
     * from collection.
     *
     * The second argument is basically the 'depth' of the report. If it's 1,
     * you only have to report changes that happened only directly in immediate
     * descendants. If it's 2, it should also include changes from the nodes
     * below the child collections. (grandchildren)
     *
     * The third (optional) argument allows a client to specify how many
     * results should be returned at most. If the limit is not specified, it
     * should be treated as infinite.
     *
     * If the limit (infinite or not) is higher than you're willing to return,
     * the result should be truncated to fit the limit.
     * Note that even when the result is truncated, syncToken must be consistent
     * with the truncated result, not the result before truncation.
     * (See RFC6578 Section 3.6 for detail)
     *
     * If the syncToken is expired (due to data cleanup) or unknown, you must
     * return null.
     *
     * The limit is 'suggestive'. You are free to ignore it.
     * TODO: RFC6578 Setion 3.7 says that the server must fail when the server
     * cannot truncate according to the limit, so it may not be just suggestive.
     *
     * @param string $syncToken
     * @param int    $syncLevel
     * @param int    $limit
     *
     * @return array|null
     */
    public function getChanges($syncToken, $syncLevel, $limit = null)
    {
    }
}