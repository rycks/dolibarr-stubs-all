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
    public static $defaultName = 'VCALENDAR';
    /**
     * This is a list of components, and which classes they should map to.
     *
     * @var array
     */
    public static $componentMap = ['VCALENDAR' => self::class, 'VALARM' => \Sabre\VObject\Component\VAlarm::class, 'VEVENT' => \Sabre\VObject\Component\VEvent::class, 'VFREEBUSY' => \Sabre\VObject\Component\VFreeBusy::class, 'VAVAILABILITY' => \Sabre\VObject\Component\VAvailability::class, 'AVAILABLE' => \Sabre\VObject\Component\Available::class, 'VJOURNAL' => \Sabre\VObject\Component\VJournal::class, 'VTIMEZONE' => \Sabre\VObject\Component\VTimeZone::class, 'VTODO' => \Sabre\VObject\Component\VTodo::class];
    /**
     * List of value-types, and which classes they map to.
     *
     * @var array
     */
    public static $valueMap = [
        'BINARY' => \Sabre\VObject\Property\Binary::class,
        'BOOLEAN' => \Sabre\VObject\Property\Boolean::class,
        'CAL-ADDRESS' => \Sabre\VObject\Property\ICalendar\CalAddress::class,
        'DATE' => \Sabre\VObject\Property\ICalendar\Date::class,
        'DATE-TIME' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'DURATION' => \Sabre\VObject\Property\ICalendar\Duration::class,
        'FLOAT' => \Sabre\VObject\Property\FloatValue::class,
        'INTEGER' => \Sabre\VObject\Property\IntegerValue::class,
        'PERIOD' => \Sabre\VObject\Property\ICalendar\Period::class,
        'RECUR' => \Sabre\VObject\Property\ICalendar\Recur::class,
        'TEXT' => \Sabre\VObject\Property\Text::class,
        'TIME' => \Sabre\VObject\Property\Time::class,
        'UNKNOWN' => \Sabre\VObject\Property\Unknown::class,
        // jCard / jCal-only.
        'URI' => \Sabre\VObject\Property\Uri::class,
        'UTC-OFFSET' => \Sabre\VObject\Property\UtcOffset::class,
    ];
    /**
     * List of properties, and which classes they map to.
     *
     * @var array
     */
    public static $propertyMap = [
        // Calendar properties
        'CALSCALE' => \Sabre\VObject\Property\FlatText::class,
        'METHOD' => \Sabre\VObject\Property\FlatText::class,
        'PRODID' => \Sabre\VObject\Property\FlatText::class,
        'VERSION' => \Sabre\VObject\Property\FlatText::class,
        // Component properties
        'ATTACH' => \Sabre\VObject\Property\Uri::class,
        'CATEGORIES' => \Sabre\VObject\Property\Text::class,
        'CLASS' => \Sabre\VObject\Property\FlatText::class,
        'COMMENT' => \Sabre\VObject\Property\FlatText::class,
        'DESCRIPTION' => \Sabre\VObject\Property\FlatText::class,
        'GEO' => \Sabre\VObject\Property\FloatValue::class,
        'LOCATION' => \Sabre\VObject\Property\FlatText::class,
        'PERCENT-COMPLETE' => \Sabre\VObject\Property\IntegerValue::class,
        'PRIORITY' => \Sabre\VObject\Property\IntegerValue::class,
        'RESOURCES' => \Sabre\VObject\Property\Text::class,
        'STATUS' => \Sabre\VObject\Property\FlatText::class,
        'SUMMARY' => \Sabre\VObject\Property\FlatText::class,
        // Date and Time Component Properties
        'COMPLETED' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'DTEND' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'DUE' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'DTSTART' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'DURATION' => \Sabre\VObject\Property\ICalendar\Duration::class,
        'FREEBUSY' => \Sabre\VObject\Property\ICalendar\Period::class,
        'TRANSP' => \Sabre\VObject\Property\FlatText::class,
        // Time Zone Component Properties
        'TZID' => \Sabre\VObject\Property\FlatText::class,
        'TZNAME' => \Sabre\VObject\Property\FlatText::class,
        'TZOFFSETFROM' => \Sabre\VObject\Property\UtcOffset::class,
        'TZOFFSETTO' => \Sabre\VObject\Property\UtcOffset::class,
        'TZURL' => \Sabre\VObject\Property\Uri::class,
        // Relationship Component Properties
        'ATTENDEE' => \Sabre\VObject\Property\ICalendar\CalAddress::class,
        'CONTACT' => \Sabre\VObject\Property\FlatText::class,
        'ORGANIZER' => \Sabre\VObject\Property\ICalendar\CalAddress::class,
        'RECURRENCE-ID' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'RELATED-TO' => \Sabre\VObject\Property\FlatText::class,
        'URL' => \Sabre\VObject\Property\Uri::class,
        'UID' => \Sabre\VObject\Property\FlatText::class,
        // Recurrence Component Properties
        'EXDATE' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'RDATE' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'RRULE' => \Sabre\VObject\Property\ICalendar\Recur::class,
        'EXRULE' => \Sabre\VObject\Property\ICalendar\Recur::class,
        // Deprecated since rfc5545
        // Alarm Component Properties
        'ACTION' => \Sabre\VObject\Property\FlatText::class,
        'REPEAT' => \Sabre\VObject\Property\IntegerValue::class,
        'TRIGGER' => \Sabre\VObject\Property\ICalendar\Duration::class,
        // Change Management Component Properties
        'CREATED' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'DTSTAMP' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'LAST-MODIFIED' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'SEQUENCE' => \Sabre\VObject\Property\IntegerValue::class,
        // Request Status
        'REQUEST-STATUS' => \Sabre\VObject\Property\Text::class,
        // Additions from draft-daboo-valarm-extensions-04
        'ALARM-AGENT' => \Sabre\VObject\Property\Text::class,
        'ACKNOWLEDGED' => \Sabre\VObject\Property\ICalendar\DateTime::class,
        'PROXIMITY' => \Sabre\VObject\Property\Text::class,
        'DEFAULT-ALARM' => \Sabre\VObject\Property\Boolean::class,
        // Additions from draft-daboo-calendar-availability-05
        'BUSYTYPE' => \Sabre\VObject\Property\Text::class,
    ];
    /**
     * Returns the current document type.
     *
     * @return int
     */
    public function getDocumentType()
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
    public function getBaseComponents($componentName = null)
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
    public function getBaseComponent($componentName = null)
    {
    }
    /**
     * Expand all events in this VCalendar object and return a new VCalendar
     * with the expanded events.
     *
     * If this calendar object, has events with recurrence rules, this method
     * can be used to expand the event into multiple sub-events.
     *
     * Each event will be stripped from its recurrence information, and only
     * the instances of the event in the specified timerange will be left
     * alone.
     *
     * In addition, this method will cause timezone information to be stripped,
     * and normalized to UTC.
     *
     * @param DateTimeZone $timeZone reference timezone for floating dates and
     *                               times
     *
     * @return VCalendar
     */
    public function expand(\DateTimeInterface $start, \DateTimeInterface $end, \DateTimeZone $timeZone = null)
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
    public function getValidationRules()
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
    public function validate($options = 0)
    {
    }
    /**
     * Returns all components with a specific UID value.
     *
     * @return array
     */
    public function getByUID($uid)
    {
    }
}