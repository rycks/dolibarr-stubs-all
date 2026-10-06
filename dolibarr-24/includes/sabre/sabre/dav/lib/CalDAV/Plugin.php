<?php

namespace Sabre\CalDAV;

/**
 * CalDAV plugin.
 *
 * This plugin provides functionality added by CalDAV (RFC 4791)
 * It implements new reports, and the MKCALENDAR method.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * This is the official CalDAV namespace.
     */
    const NS_CALDAV = 'urn:ietf:params:xml:ns:caldav';
    /**
     * This is the namespace for the proprietary calendarserver extensions.
     */
    const NS_CALENDARSERVER = 'http://calendarserver.org/ns/';
    /**
     * The hardcoded root for calendar objects. It is unfortunate
     * that we're stuck with it, but it will have to do for now.
     */
    const CALENDAR_ROOT = 'calendars';
    /**
     * Reference to server object.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * The default PDO storage uses a MySQL MEDIUMBLOB for iCalendar data,
     * which can hold up to 2^24 = 16777216 bytes. This is plenty. We're
     * capping it to 10M here.
     */
    protected $maxResourceSize = 10000000;
    /**
     * Use this method to tell the server this plugin defines additional
     * HTTP methods.
     *
     * This method is passed a uri. It should only return HTTP methods that are
     * available for the specified uri.
     *
     * @param string $uri
     *
     * @return array
     */
    public function getHTTPMethods($uri)
    {
    }
    /**
     * Returns the path to a principal's calendar home.
     *
     * The return url must not end with a slash.
     * This function should return null in case a principal did not have
     * a calendar home.
     *
     * @param string $principalUrl
     *
     * @return string
     */
    public function getCalendarHomeForPrincipal($principalUrl)
    {
    }
    /**
     * Returns a list of features for the DAV: HTTP header.
     *
     * @return array
     */
    public function getFeatures()
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using DAV\Server::getPlugin
     *
     * @return string
     */
    public function getPluginName()
    {
    }
    /**
     * Returns a list of reports this plugin supports.
     *
     * This will be used in the {DAV:}supported-report-set property.
     * Note that you still need to subscribe to the 'report' event to actually
     * implement them
     *
     * @param string $uri
     *
     * @return array
     */
    public function getSupportedReportSet($uri)
    {
    }
    /**
     * Initializes the plugin.
     */
    public function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * This functions handles REPORT requests specific to CalDAV.
     *
     * @param string $reportName
     * @param mixed  $report
     * @param mixed  $path
     *
     * @return bool|null
     */
    public function report($reportName, $report, $path)
    {
    }
    /**
     * This function handles the MKCALENDAR HTTP method, which creates
     * a new calendar.
     *
     * @return bool
     */
    public function httpMkCalendar(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * PropFind.
     *
     * This method handler is invoked before any after properties for a
     * resource are fetched. This allows us to add in any CalDAV specific
     * properties.
     */
    public function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This function handles the calendar-multiget REPORT.
     *
     * This report is used by the client to fetch the content of a series
     * of urls. Effectively avoiding a lot of redundant requests.
     *
     * @param CalendarMultiGetReport $report
     */
    public function calendarMultiGetReport($report)
    {
    }
    /**
     * This function handles the calendar-query REPORT.
     *
     * This report is used by clients to request calendar objects based on
     * complex conditions.
     *
     * @param Xml\Request\CalendarQueryReport $report
     */
    public function calendarQueryReport($report)
    {
    }
    /**
     * This method is responsible for parsing the request and generating the
     * response for the CALDAV:free-busy-query REPORT.
     */
    protected function freeBusyQueryReport(\Sabre\CalDAV\Xml\Request\FreeBusyQueryReport $report)
    {
    }
    /**
     * This method is triggered before a file gets updated with new content.
     *
     * This plugin uses this method to ensure that CalDAV objects receive
     * valid calendar data.
     *
     * @param string   $path
     * @param resource $data
     * @param bool     $modified should be set to true, if this event handler
     *                           changed &$data
     */
    public function beforeWriteContent($path, \Sabre\DAV\IFile $node, &$data, &$modified)
    {
    }
    /**
     * This method is triggered before a new file is created.
     *
     * This plugin uses this method to ensure that newly created calendar
     * objects contain valid calendar data.
     *
     * @param string   $path
     * @param resource $data
     * @param bool     $modified should be set to true, if this event handler
     *                           changed &$data
     */
    public function beforeCreateFile($path, &$data, \Sabre\DAV\ICollection $parentNode, &$modified)
    {
    }
    /**
     * Checks if the submitted iCalendar data is in fact, valid.
     *
     * An exception is thrown if it's not.
     *
     * @param resource|string   $data
     * @param string            $path
     * @param bool              $modified should be set to true, if this event handler
     *                                    changed &$data
     * @param RequestInterface  $request  the http request
     * @param ResponseInterface $response the http response
     * @param bool              $isNew    is the item a new one, or an update
     */
    protected function validateICalendar(&$data, $path, &$modified, \Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response, $isNew)
    {
    }
    /**
     * This method is triggered whenever a subsystem reqeuests the privileges
     * that are supported on a particular node.
     */
    public function getSupportedPrivilegeSet(\Sabre\DAV\INode $node, array &$supportedPrivilegeSet)
    {
    }
    /**
     * This method is used to generate HTML output for the
     * DAV\Browser\Plugin. This allows us to generate an interface users
     * can use to create new calendars.
     *
     * @param string $output
     *
     * @return bool
     */
    public function htmlActionsPanel(\Sabre\DAV\INode $node, &$output)
    {
    }
    /**
     * This event is triggered after GET requests.
     *
     * This is used to transform data into jCal, if this was requested.
     */
    public function httpAfterGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Returns a bunch of meta-data about the plugin.
     *
     * Providing this information is optional, and is mainly displayed by the
     * Browser plugin.
     *
     * The description key in the returned array may contain html and will not
     * be sanitized.
     *
     * @return array
     */
    public function getPluginInfo()
    {
    }
}