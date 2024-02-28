<?php

namespace Sabre\VObject\Component;

/**
 * The VCalendar component.
 *
 * This component adds functionality to a component, specific for a VCALENDAR.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VCalendar extends \Sabre\VObject\Document
{
    /**
     * The default name for this component.
     *
     * This should be 'VCALENDAR' or 'VCARD'.
     *
     * @var string
     */
    static $defaultName = 'VCALENDAR';
    /**
     * This is a list of components, and which classes they should map to.
     *
     * @var array
     */
    static $componentMap = ['VCALENDAR' => 'Sabre\\VObject\\Component\\VCalendar', 'VALARM' => 'Sabre\\VObject\\Component\\VAlarm', 'VEVENT' => 'Sabre\\VObject\\Component\\VEvent', 'VFREEBUSY' => 'Sabre\\VObject\\Component\\VFreeBusy', 'VAVAILABILITY' => 'Sabre\\VObject\\Component\\VAvailability', 'AVAILABLE' => 'Sabre\\VObject\\Component\\Available', 'VJOURNAL' => 'Sabre\\VObject\\Component\\VJournal', 'VTIMEZONE' => 'Sabre\\VObject\\Component\\VTimeZone', 'VTODO' => 'Sabre\\VObject\\Component\\VTodo'];
    /**
     * List of value-types, and which classes they map to.
     *
     * @var array
     */
    static $valueMap = [
        'BINARY' => 'Sabre\\VObject\\Property\\Binary',
        'BOOLEAN' => 'Sabre\\VObject\\Property\\Boolean',
        'CAL-ADDRESS' => 'Sabre\\VObject\\Property\\ICalendar\\CalAddress',
        'DATE' => 'Sabre\\VObject\\Property\\ICalendar\\Date',
        'DATE-TIME' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'DURATION' => 'Sabre\\VObject\\Property\\ICalendar\\Duration',
        'FLOAT' => 'Sabre\\VObject\\Property\\FloatValue',
        'INTEGER' => 'Sabre\\VObject\\Property\\IntegerValue',
        'PERIOD' => 'Sabre\\VObject\\Property\\ICalendar\\Period',
        'RECUR' => 'Sabre\\VObject\\Property\\ICalendar\\Recur',
        'TEXT' => 'Sabre\\VObject\\Property\\Text',
        'TIME' => 'Sabre\\VObject\\Property\\Time',
        'UNKNOWN' => 'Sabre\\VObject\\Property\\Unknown',
        // jCard / jCal-only.
        'URI' => 'Sabre\\VObject\\Property\\Uri',
        'UTC-OFFSET' => 'Sabre\\VObject\\Property\\UtcOffset',
    ];
    /**
     * List of properties, and which classes they map to.
     *
     * @var array
     */
    static $propertyMap = [
        // Calendar properties
        'CALSCALE' => 'Sabre\\VObject\\Property\\FlatText',
        'METHOD' => 'Sabre\\VObject\\Property\\FlatText',
        'PRODID' => 'Sabre\\VObject\\Property\\FlatText',
        'VERSION' => 'Sabre\\VObject\\Property\\FlatText',
        // Component properties
        'ATTACH' => 'Sabre\\VObject\\Property\\Uri',
        'CATEGORIES' => 'Sabre\\VObject\\Property\\Text',
        'CLASS' => 'Sabre\\VObject\\Property\\FlatText',
        'COMMENT' => 'Sabre\\VObject\\Property\\FlatText',
        'DESCRIPTION' => 'Sabre\\VObject\\Property\\FlatText',
        'GEO' => 'Sabre\\VObject\\Property\\FloatValue',
        'LOCATION' => 'Sabre\\VObject\\Property\\FlatText',
        'PERCENT-COMPLETE' => 'Sabre\\VObject\\Property\\IntegerValue',
        'PRIORITY' => 'Sabre\\VObject\\Property\\IntegerValue',
        'RESOURCES' => 'Sabre\\VObject\\Property\\Text',
        'STATUS' => 'Sabre\\VObject\\Property\\FlatText',
        'SUMMARY' => 'Sabre\\VObject\\Property\\FlatText',
        // Date and Time Component Properties
        'COMPLETED' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'DTEND' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'DUE' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'DTSTART' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'DURATION' => 'Sabre\\VObject\\Property\\ICalendar\\Duration',
        'FREEBUSY' => 'Sabre\\VObject\\Property\\ICalendar\\Period',
        'TRANSP' => 'Sabre\\VObject\\Property\\FlatText',
        // Time Zone Component Properties
        'TZID' => 'Sabre\\VObject\\Property\\FlatText',
        'TZNAME' => 'Sabre\\VObject\\Property\\FlatText',
        'TZOFFSETFROM' => 'Sabre\\VObject\\Property\\UtcOffset',
        'TZOFFSETTO' => 'Sabre\\VObject\\Property\\UtcOffset',
        'TZURL' => 'Sabre\\VObject\\Property\\Uri',
        // Relationship Component Properties
        'ATTENDEE' => 'Sabre\\VObject\\Property\\ICalendar\\CalAddress',
        'CONTACT' => 'Sabre\\VObject\\Property\\FlatText',
        'ORGANIZER' => 'Sabre\\VObject\\Property\\ICalendar\\CalAddress',
        'RECURRENCE-ID' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'RELATED-TO' => 'Sabre\\VObject\\Property\\FlatText',
        'URL' => 'Sabre\\VObject\\Property\\Uri',
        'UID' => 'Sabre\\VObject\\Property\\FlatText',
        // Recurrence Component Properties
        'EXDATE' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'RDATE' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'RRULE' => 'Sabre\\VObject\\Property\\ICalendar\\Recur',
        'EXRULE' => 'Sabre\\VObject\\Property\\ICalendar\\Recur',
        // Deprecated since rfc5545
        // Alarm Component Properties
        'ACTION' => 'Sabre\\VObject\\Property\\FlatText',
        'REPEAT' => 'Sabre\\VObject\\Property\\IntegerValue',
        'TRIGGER' => 'Sabre\\VObject\\Property\\ICalendar\\Duration',
        // Change Management Component Properties
        'CREATED' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'DTSTAMP' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'LAST-MODIFIED' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'SEQUENCE' => 'Sabre\\VObject\\Property\\IntegerValue',
        // Request Status
        'REQUEST-STATUS' => 'Sabre\\VObject\\Property\\Text',
        // Additions from draft-daboo-valarm-extensions-04
        'ALARM-AGENT' => 'Sabre\\VObject\\Property\\Text',
        'ACKNOWLEDGED' => 'Sabre\\VObject\\Property\\ICalendar\\DateTime',
        'PROXIMITY' => 'Sabre\\VObject\\Property\\Text',
        'DEFAULT-ALARM' => 'Sabre\\VObject\\Property\\Boolean',
        // Additions from draft-daboo-calendar-availability-05
        'BUSYTYPE' => 'Sabre\\VObject\\Property\\Text',
    ];
    /**
     * Returns the current document type.
     *
     * @return int
     */
    function getDocumentType()
    {
    }
    /**
     * Returns a list of all 'base components'. For instance, if an Event has
     * a recurrence rule, and one instance is overridden, the overridden event
     * will have the same UID, but will be excluded from this list.
     *
     * VTIMEZONE components will always be excluded.
     *
     * @param string $componentName filter by component name
     *
     * @return VObject\Component[]
     */
    function getBaseComponents($componentName = null)
    {
    }
    /**
     * Returns the first component that is not a VTIMEZONE, and does not have
     * an RECURRENCE-ID.
     *
     * If there is no such component, null will be returned.
     *
     * @param string $componentName filter by component name
     *
     * @return VObject\Component|null
     */
    function getBaseComponent($componentName = null)
    {
    }
    /**
     * Expand all events in this VCalendar object and return a new VCalendar
     * with the expanded events.
     *
     * If this calendar object, has events with recurrence rules, this method
     * can be used to expand the event into multiple sub-events.
     *
     * Each event will be stripped from it's recurrence information, and only
     * the instances of the event in the specified timerange will be left
     * alone.
     *
     * In addition, this method will cause timezone information to be stripped,
     * and normalized to UTC.
     *
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     * @param DateTimeZone $timeZone reference timezone for floating dates and
     *                     times.
     * @return VCalendar
     */
    function expand(\DateTimeInterface $start, \DateTimeInterface $end, \DateTimeZone $timeZone = null)
    {
    }
    /**
     * This method should return a list of default property values.
     *
     * @return array
     */
    protected function getDefaults()
    {
    }
    /**
     * A simple list of validation rules.
     *
     * This is simply a list of properties, and how many times they either
     * must or must not appear.
     *
     * Possible values per property:
     *   * 0 - Must not appear.
     *   * 1 - Must appear exactly once.
     *   * + - Must appear at least once.
     *   * * - Can appear any number of times.
     *   * ? - May appear, but not more than once.
     *
     * @var array
     */
    function getValidationRules()
    {
    }
    /**
     * Validates the node for correctness.
     *
     * The following options are supported:
     *   Node::REPAIR - May attempt to automatically repair the problem.
     *   Node::PROFILE_CARDDAV - Validate the vCard for CardDAV purposes.
     *   Node::PROFILE_CALDAV - Validate the iCalendar for CalDAV purposes.
     *
     * This method returns an array with detected problems.
     * Every element has the following properties:
     *
     *  * level - problem level.
     *  * message - A human-readable string describing the issue.
     *  * node - A reference to the problematic node.
     *
     * The level means:
     *   1 - The issue was repaired (only happens if REPAIR was turned on).
     *   2 - A warning.
     *   3 - An error.
     *
     * @param int $options
     *
     * @return array
     */
    function validate($options = 0)
    {
    }
    /**
     * Returns all components with a specific UID value.
     *
     * @return array
     */
    function getByUID($uid)
    {
    }
}