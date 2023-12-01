<?php

namespace Sabre\CalDAV\Schedule;

/**
 * CalDAV scheduling plugin.
 * =========================
 *
 * This plugin provides the functionality added by the "Scheduling Extensions
 * to CalDAV" standard, as defined in RFC6638.
 *
 * calendar-auto-schedule largely works by intercepting a users request to
 * update their local calendar. If a user creates a new event with attendees,
 * this plugin is supposed to grab the information from that event, and notify
 * the attendees of this.
 *
 * There's 3 possible transports for this:
 * * local delivery
 * * delivery through email (iMip)
 * * server-to-server delivery (iSchedule)
 *
 * iMip is simply, because we just need to add the iTip message as an email
 * attachment. Local delivery is harder, because we both need to add this same
 * message to a local DAV inbox, as well as live-update the relevant events.
 *
 * iSchedule is something for later.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * This is the official CalDAV namespace
     */
    const NS_CALDAV = 'urn:ietf:params:xml:ns:caldav';
    /**
     * Reference to main Server object.
     *
     * @var Server
     */
    protected $server;
    /**
     * Returns a list of features for the DAV: HTTP header.
     *
     * @return array
     */
    function getFeatures()
    {
    }
    /**
     * Returns the name of the plugin.
     *
     * Using this name other plugins will be able to access other plugins
     * using Server::getPlugin
     *
     * @return string
     */
    function getPluginName()
    {
    }
    /**
     * Initializes the plugin
     *
     * @param Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Use this method to tell the server this plugin defines additional
     * HTTP methods.
     *
     * This method is passed a uri. It should only return HTTP methods that are
     * available for the specified uri.
     *
     * @param string $uri
     * @return array
     */
    function getHTTPMethods($uri)
    {
    }
    /**
     * This method handles POST request for the outbox.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function httpPost(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method handler is invoked during fetching of properties.
     *
     * We use this event to add calendar-auto-schedule-specific properties.
     *
     * @param PropFind $propFind
     * @param INode $node
     * @return void
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method is called during property updates.
     *
     * @param string $path
     * @param PropPatch $propPatch
     * @return void
     */
    function propPatch($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * This method is triggered whenever there was a calendar object gets
     * created or updated.
     *
     * @param RequestInterface $request HTTP request
     * @param ResponseInterface $response HTTP Response
     * @param VCalendar $vCal Parsed iCalendar object
     * @param mixed $calendarPath Path to calendar collection
     * @param mixed $modified The iCalendar object has been touched.
     * @param mixed $isNew Whether this was a new item or we're updating one
     * @return void
     */
    function calendarObjectChange(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response, \Sabre\VObject\Component\VCalendar $vCal, $calendarPath, &$modified, $isNew)
    {
    }
    /**
     * This method is responsible for delivering the ITip message.
     *
     * @param ITip\Message $iTipMessage
     * @return void
     */
    function deliver(\Sabre\VObject\ITip\Message $iTipMessage)
    {
    }
    /**
     * This method is triggered before a file gets deleted.
     *
     * We use this event to make sure that when this happens, attendees get
     * cancellations, and organizers get 'DECLINED' statuses.
     *
     * @param string $path
     * @return void
     */
    function beforeUnbind($path)
    {
    }
    /**
     * Event handler for the 'schedule' event.
     *
     * This handler attempts to look at local accounts to deliver the
     * scheduling object.
     *
     * @param ITip\Message $iTipMessage
     * @return void
     */
    function scheduleLocalDelivery(\Sabre\VObject\ITip\Message $iTipMessage)
    {
    }
    /**
     * This method is triggered whenever a subsystem requests the privileges
     * that are supported on a particular node.
     *
     * We need to add a number of privileges for scheduling purposes.
     *
     * @param INode $node
     * @param array $supportedPrivilegeSet
     */
    function getSupportedPrivilegeSet(\Sabre\DAV\INode $node, array &$supportedPrivilegeSet)
    {
    }
    /**
     * This method looks at an old iCalendar object, a new iCalendar object and
     * starts sending scheduling messages based on the changes.
     *
     * A list of addresses needs to be specified, so the system knows who made
     * the update, because the behavior may be different based on if it's an
     * attendee or an organizer.
     *
     * This method may update $newObject to add any status changes.
     *
     * @param VCalendar|string $oldObject
     * @param VCalendar $newObject
     * @param array $addresses
     * @param array $ignore Any addresses to not send messages to.
     * @param bool $modified A marker to indicate that the original object
     *   modified by this process.
     * @return void
     */
    protected function processICalendarChange($oldObject = null, \Sabre\VObject\Component\VCalendar $newObject, array $addresses, array $ignore = [], &$modified = false)
    {
    }
    /**
     * Returns a list of addresses that are associated with a principal.
     *
     * @param string $principal
     * @return array
     */
    protected function getAddressesForPrincipal($principal)
    {
    }
    /**
     * This method handles POST requests to the schedule-outbox.
     *
     * Currently, two types of requests are supported:
     *   * FREEBUSY requests from RFC 6638
     *   * Simple iTIP messages from draft-desruisseaux-caldav-sched-04
     *
     * The latter is from an expired early draft of the CalDAV scheduling
     * extensions, but iCal depends on a feature from that spec, so we
     * implement it.
     *
     * @param IOutbox $outboxNode
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return void
     */
    function outboxRequest(\Sabre\CalDAV\Schedule\IOutbox $outboxNode, \Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is responsible for parsing a free-busy query request and
     * returning it's result.
     *
     * @param IOutbox $outbox
     * @param VObject\Component $vObject
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return string
     */
    protected function handleFreeBusyRequest(\Sabre\CalDAV\Schedule\IOutbox $outbox, \Sabre\VObject\Component $vObject, \Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Returns free-busy information for a specific address. The returned
     * data is an array containing the following properties:
     *
     * calendar-data : A VFREEBUSY VObject
     * request-status : an iTip status code.
     * href: The principal's email address, as requested
     *
     * The following request status codes may be returned:
     *   * 2.0;description
     *   * 3.7;description
     *
     * @param string $email address
     * @param \DateTimeInterface $start
     * @param \DateTimeInterface $end
     * @param VObject\Component $request
     * @return array
     */
    protected function getFreeBusyForEmail($email, \DateTimeInterface $start, \DateTimeInterface $end, \Sabre\VObject\Component $request)
    {
    }
    /**
     * This method checks the 'Schedule-Reply' header
     * and returns false if it's 'F', otherwise true.
     *
     * @param RequestInterface $request
     * @return bool
     */
    private function scheduleReply(\Sabre\HTTP\RequestInterface $request)
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