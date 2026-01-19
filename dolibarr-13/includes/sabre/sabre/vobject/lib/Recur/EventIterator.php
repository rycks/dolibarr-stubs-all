<?php

namespace Sabre\VObject\Recur;

/**
 * This class is used to determine new for a recurring event, when the next
 * events occur.
 *
 * This iterator may loop infinitely in the future, therefore it is important
 * that if you use this class, you set hard limits for the amount of iterations
 * you want to handle.
 *
 * Note that currently there is not full support for the entire iCalendar
 * specification, as it's very complex and contains a lot of permutations
 * that's not yet used very often in software.
 *
 * For the focus has been on features as they actually appear in Calendaring
 * software, but this may well get expanded as needed / on demand
 *
 * The following RRULE properties are supported
 *   * UNTIL
 *   * INTERVAL
 *   * COUNT
 *   * FREQ=DAILY
 *     * BYDAY
 *     * BYHOUR
 *     * BYMONTH
 *   * FREQ=WEEKLY
 *     * BYDAY
 *     * BYHOUR
 *     * WKST
 *   * FREQ=MONTHLY
 *     * BYMONTHDAY
 *     * BYDAY
 *     * BYSETPOS
 *   * FREQ=YEARLY
 *     * BYMONTH
 *     * BYYEARDAY
 *     * BYWEEKNO
 *     * BYMONTHDAY (only if BYMONTH is also set)
 *     * BYDAY (only if BYMONTH is also set)
 *
 * Anything beyond this is 'undefined', which means that it may get ignored, or
 * you may get unexpected results. The effect is that in some applications the
 * specified recurrence may look incorrect, or is missing.
 *
 * The recurrence iterator also does not yet support THISANDFUTURE.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class EventIterator implements \Iterator
{
    /**
     * Reference timeZone for floating dates and times.
     *
     * @var DateTimeZone
     */
    protected $timeZone;
    /**
     * True if we're iterating an all-day event.
     *
     * @var bool
     */
    protected $allDay = false;
    /**
     * Creates the iterator.
     *
     * There's three ways to set up the iterator.
     *
     * 1. You can pass a VCALENDAR component and a UID.
     * 2. You can pass an array of VEVENTs (all UIDS should match).
     * 3. You can pass a single VEVENT component.
     *
     * Only the second method is recomended. The other 1 and 3 will be removed
     * at some point in the future.
     *
     * The $uid parameter is only required for the first method.
     *
     * @param Component|array $input
     * @param string|null $uid
     * @param DateTimeZone $timeZone Reference timezone for floating dates and
     *                               times.
     */
    function __construct($input, $uid = null, \DateTimeZone $timeZone = null)
    {
    }
    /**
     * Returns the date for the current position of the iterator.
     *
     * @return DateTimeImmutable
     */
    function current()
    {
    }
    /**
     * This method returns the start date for the current iteration of the
     * event.
     *
     * @return DateTimeImmutable
     */
    function getDtStart()
    {
    }
    /**
     * This method returns the end date for the current iteration of the
     * event.
     *
     * @return DateTimeImmutable
     */
    function getDtEnd()
    {
    }
    /**
     * Returns a VEVENT for the current iterations of the event.
     *
     * This VEVENT will have a recurrence id, and it's DTSTART and DTEND
     * altered.
     *
     * @return VEvent
     */
    function getEventObject()
    {
    }
    /**
     * Returns the current position of the iterator.
     *
     * This is for us simply a 0-based index.
     *
     * @return int
     */
    function key()
    {
    }
    /**
     * This is called after next, to see if the iterator is still at a valid
     * position, or if it's at the end.
     *
     * @return bool
     */
    function valid()
    {
    }
    /**
     * Sets the iterator back to the starting point.
     */
    function rewind()
    {
    }
    /**
     * Advances the iterator with one step.
     *
     * @return void
     */
    function next()
    {
    }
    /**
     * Quickly jump to a date in the future.
     *
     * @param DateTimeInterface $dateTime
     */
    function fastForward(\DateTimeInterface $dateTime)
    {
    }
    /**
     * Returns true if this recurring event never ends.
     *
     * @return bool
     */
    function isInfinite()
    {
    }
    /**
     * RRULE parser.
     *
     * @var RRuleIterator
     */
    protected $recurIterator;
    /**
     * The duration, in seconds, of the master event.
     *
     * We use this to calculate the DTEND for subsequent events.
     */
    protected $eventDuration;
    /**
     * A reference to the main (master) event.
     *
     * @var VEVENT
     */
    protected $masterEvent;
    /**
     * List of overridden events.
     *
     * @var array
     */
    protected $overriddenEvents = [];
    /**
     * Overridden event index.
     *
     * Key is timestamp, value is the list of indexes of the item in the $overriddenEvent
     * property.
     *
     * @var array
     */
    protected $overriddenEventsIndex;
    /**
     * A list of recurrence-id's that are either part of EXDATE, or are
     * overridden.
     *
     * @var array
     */
    protected $exceptions = [];
    /**
     * Internal event counter.
     *
     * @var int
     */
    protected $counter;
    /**
     * The very start of the iteration process.
     *
     * @var DateTimeImmutable
     */
    protected $startDate;
    /**
     * Where we are currently in the iteration process.
     *
     * @var DateTimeImmutable
     */
    protected $currentDate;
    /**
     * The next date from the rrule parser.
     *
     * Sometimes we need to temporary store the next date, because an
     * overridden event came before.
     *
     * @var DateTimeImmutable
     */
    protected $nextDate;
    /**
     * The event that overwrites the current iteration
     *
     * @var VEVENT
     */
    protected $currentOverriddenEvent;
}