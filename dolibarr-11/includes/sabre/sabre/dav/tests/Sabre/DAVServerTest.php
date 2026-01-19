<?php

namespace Sabre;

/**
 * This class may be used as a basis for other webdav-related unittests.
 *
 * This class is supposed to provide a reasonably big framework to quickly get
 * a testing environment running.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class DAVServerTest extends \PHPUnit_Framework_TestCase
{
    protected $setupCalDAV = false;
    protected $setupCardDAV = false;
    protected $setupACL = false;
    protected $setupCalDAVSharing = false;
    protected $setupCalDAVScheduling = false;
    protected $setupCalDAVSubscriptions = false;
    protected $setupCalDAVICSExport = false;
    protected $setupLocks = false;
    protected $setupFiles = false;
    protected $setupSharing = false;
    protected $setupPropertyStorage = false;
    /**
     * An array with calendars. Every calendar should have
     *   - principaluri
     *   - uri
     */
    protected $caldavCalendars = [];
    protected $caldavCalendarObjects = [];
    protected $carddavAddressBooks = [];
    protected $carddavCards = [];
    /**
     * @var Sabre\DAV\Server
     */
    protected $server;
    protected $tree = [];
    protected $caldavBackend;
    protected $carddavBackend;
    protected $principalBackend;
    protected $locksBackend;
    protected $propertyStorageBackend;
    /**
     * @var Sabre\CalDAV\Plugin
     */
    protected $caldavPlugin;
    /**
     * @var Sabre\CardDAV\Plugin
     */
    protected $carddavPlugin;
    /**
     * @var Sabre\DAVACL\Plugin
     */
    protected $aclPlugin;
    /**
     * @var Sabre\CalDAV\SharingPlugin
     */
    protected $caldavSharingPlugin;
    /**
     * CalDAV scheduling plugin
     *
     * @var CalDAV\Schedule\Plugin
     */
    protected $caldavSchedulePlugin;
    /**
     * @var Sabre\DAV\Auth\Plugin
     */
    protected $authPlugin;
    /**
     * @var Sabre\DAV\Locks\Plugin
     */
    protected $locksPlugin;
    /**
     * Sharing plugin.
     *
     * @var \Sabre\DAV\Sharing\Plugin
     */
    protected $sharingPlugin;
    /*
     * @var Sabre\DAV\PropertyStorage\Plugin
     */
    protected $propertyStoragePlugin;
    /**
     * If this string is set, we will automatically log in the user with this
     * name.
     */
    protected $autoLogin = null;
    function setUp()
    {
    }
    function initializeEverything()
    {
    }
    /**
     * Makes a request, and returns a response object.
     *
     * You can either pass an instance of Sabre\HTTP\Request, or an array,
     * which will then be used as the _SERVER array.
     *
     * If $expectedStatus is set, we'll compare it with the HTTP status of
     * the returned response. If it doesn't match, we'll immediately fail
     * the test.
     *
     * @param array|\Sabre\HTTP\Request $request
     * @param int $expectedStatus
     * @return \Sabre\HTTP\Response
     */
    function request($request, $expectedStatus = null)
    {
    }
    /**
     * This function takes a username and sets the server in a state where
     * this user is logged in, and no longer requires an authentication check.
     *
     * @param string $userName
     */
    function autoLogin($userName)
    {
    }
    /**
     * Override this to provide your own Tree for your test-case.
     */
    function setUpTree()
    {
    }
    function setUpBackends()
    {
    }
    function assertHttpStatus($expectedStatus, \Sabre\HTTP\Request $req)
    {
    }
}