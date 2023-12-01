<?php

namespace Sabre\CalDAV;

/**
 * ICS Exporter
 *
 * This plugin adds the ability to export entire calendars as .ics files.
 * This is useful for clients that don't support CalDAV yet. They often do
 * support ics files.
 *
 * To use this, point a http client to a caldav calendar, and add ?expand to
 * the url.
 *
 * Further options that can be added to the url:
 *   start=123456789 - Only return events after the given unix timestamp
 *   end=123245679   - Only return events from before the given unix timestamp
 *   expand=1        - Strip timezone information and expand recurring events.
 *                     If you'd like to expand, you _must_ also specify start
 *                     and end.
 *
 * By default this plugin returns data in the text/calendar format (iCalendar
 * 2.0). If you'd like to receive jCal data instead, you can use an Accept
 * header:
 *
 * Accept: application/calendar+json
 *
 * Alternatively, you can also specify this in the url using
 * accept=application/calendar+json, or accept=jcal for short. If the url
 * parameter and Accept header is specified, the url parameter wins.
 *
 * Note that specifying a start or end data implies that only events will be
 * returned. VTODO and VJOURNAL will be stripped.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ICSExportPlugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Reference to Server class
     *
     * @var \Sabre\DAV\Server
     */
    protected $server;
    /**
     * Initializes the plugin and registers event handlers
     *
     * @param \Sabre\DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Intercepts GET requests on calendar urls ending with ?export.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is responsible for generating the actual, full response.
     *
     * @param string $path
     * @param DateTime|null $start
     * @param DateTime|null $end
     * @param bool $expand
     * @param string $componentType
     * @param string $format
     * @param array $properties
     * @param ResponseInterface $response
     */
    protected function generateResponse($path, $start, $end, $expand, $componentType, $format, $properties, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Merges all calendar objects, and builds one big iCalendar blob.
     *
     * @param array $properties Some CalDAV properties
     * @param array $inputObjects
     * @return VObject\Component\VCalendar
     */
    function mergeObjects(array $properties, array $inputObjects)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using \Sabre\DAV\Server::getPlugin
     *
     * @return string
     */
    function getPluginName()
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
    function getPluginInfo()
    {
    }
}