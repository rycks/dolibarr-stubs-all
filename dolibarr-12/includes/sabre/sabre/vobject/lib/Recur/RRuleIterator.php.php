<?php

namespace Sabre\VObject\Recur;

/**
 * RRuleParser.
 *
 * This class receives an RRULE string, and allows you to iterate to get a list
 * of dates in that recurrence.
 *
 * For instance, passing: FREQ=DAILY;LIMIT=5 will cause the iterator to contain
 * 5 items, one for each day.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class RRuleIterator implements \Iterator
{
    /**
     * Creates the Iterator.
     *
     * @param string|array $rrule
     * @param DateTimeInterface $start
     */
    function __construct($rrule, \DateTimeInterface $start)
    {
    }
    /* Implementation of the Iterator interface {{{ */
    function current()
    {
    }
    /**
     * Returns the current item number.
     *
     * @return int
     */
    function key()
    {
    }
    /**
     * Returns whether the current item is a valid item for the recurrence
     * iterator. This will return false if we've gone beyond the UNTIL or COUNT
     * statements.
     *
     * @return bool
     */
    function valid()
    {
    }
    /**
     * Resets the iterator.
     *
     * @return void
     */
    function rewind()
    {
    }
    /**
     * Goes on to the next iteration.
     *
     * @return void
     */
    function next()
    {
    }
    /* End of Iterator implementation }}} */
    /**
     * Returns true if this recurring event never ends.
     *
     * @return bool
     */
    function isInfinite()
    {
    }
    /**
     * This method allows you to quickly go to the next occurrence after the
     * specified date.
     *
     * @param DateTimeInterface $dt
     *
     * @return void
     */
    function fastForward(\DateTimeInterface $dt)
    {
    }
    /**
     * The reference start date/time for the rrule.
     *
     * All calculations are based on this initial date.
     *
     * @var DateTimeInterface
     */
    protected $startDate;
    /**
     * The date of the current iteration. You can get this by calling
     * ->current().
     *
     * @var DateTimeInterface
     */
    protected $currentDate;
    /**
     * Frequency is one of: secondly, minutely, hourly, daily, weekly, monthly,
     * yearly.
     *
     * @var string
     */
    protected $frequency;
    /**
     * The number of recurrences, or 'null' if infinitely recurring.
     *
     * @var int
     */
    protected $count;
    /**
     * The interval.
     *
     * If for example frequency is set to daily, interval = 2 would mean every
     * 2 days.
     *
     * @var int
     */
    protected $interval = 1;
    /**
     * The last instance of this recurrence, inclusively.
     *
     * @var DateTimeInterface|null
     */
    protected $until;
    /**
     * Which seconds to recur.
     *
     * This is an array of integers (between 0 and 60)
     *
     * @var array
     */
    protected $bySecond;
    /**
     * Which minutes to recur.
     *
     * This is an array of integers (between 0 and 59)
     *
     * @var array
     */
    protected $byMinute;
    /**
     * Which hours to recur.
     *
     * This is an array of integers (between 0 and 23)
     *
     * @var array
     */
    protected $byHour;
    /**
     * The current item in the list.
     *
     * You can get this number with the key() method.
     *
     * @var int
     */
    protected $counter = 0;
    /**
     * Which weekdays to recur.
     *
     * This is an array of weekdays
     *
     * This may also be preceeded by a positive or negative integer. If present,
     * this indicates the nth occurrence of a specific day within the monthly or
     * yearly rrule. For instance, -2TU indicates the second-last tuesday of
     * the month, or year.
     *
     * @var array
     */
    protected $byDay;
    /**
     * Which days of the month to recur.
     *
     * This is an array of days of the months (1-31). The value can also be
     * negative. -5 for instance means the 5th last day of the month.
     *
     * @var array
     */
    protected $byMonthDay;
    /**
     * Which days of the year to recur.
     *
     * This is an array with days of the year (1 to 366). The values can also
     * be negative. For instance, -1 will always represent the last day of the
     * year. (December 31st).
     *
     * @var array
     */
    protected $byYearDay;
    /**
     * Which week numbers to recur.
     *
     * This is an array of integers from 1 to 53. The values can also be
     * negative. -1 will always refer to the last week of the year.
     *
     * @var array
     */
    protected $byWeekNo;
    /**
     * Which months to recur.
     *
     * This is an array of integers from 1 to 12.
     *
     * @var array
     */
    protected $byMonth;
    /**
     * Which items in an existing st to recur.
     *
     * These numbers work together with an existing by* rule. It specifies
     * exactly which items of the existing by-rule to filter.
     *
     * Valid values are 1 to 366 and -1 to -366. As an example, this can be
     * used to recur the last workday of the month.
     *
     * This would be done by setting frequency to 'monthly', byDay to
     * 'MO,TU,WE,TH,FR' and bySetPos to -1.
     *
     * @var array
     */
    protected $bySetPos;
    /**
     * When the week starts.
     *
     * @var string
     */
    protected $weekStart = 'MO';
    /* Functions that advance the iterator {{{ */
    /**
     * Does the processing for advancing the iterator for hourly frequency.
     *
     * @return void
     */
    protected function nextHourly()
    {
    }
    /**
     * Does the processing for advancing the iterator for daily frequency.
     *
     * @return void
     */
    protected function nextDaily()
    {
    }
    /**
     * Does the processing for advancing the iterator for weekly frequency.
     *
     * @return void
     */
    protected function nextWeekly()
    {
    }
    /**
     * Does the processing for advancing the iterator for monthly frequency.
     *
     * @return void
     */
    protected function nextMonthly()
    {
    }
    /**
     * Does the processing for advancing the iterator for yearly frequency.
     *
     * @return void
     */
    protected function nextYearly()
    {
    }
    /* }}} */
    /**
     * This method receives a string from an RRULE property, and populates this
     * class with all the values.
     *
     * @param string|array $rrule
     *
     * @return void
     */
    protected function parseRRule($rrule)
    {
    }
    /**
     * Mappings between the day number and english day name.
     *
     * @var array
     */
    protected $dayNames = [0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday'];
    /**
     * Returns all the occurrences for a monthly frequency with a 'byDay' or
     * 'byMonthDay' expansion for the current month.
     *
     * The returned list is an array of integers with the day of month (1-31).
     *
     * @return array
     */
    protected function getMonthlyOccurrences()
    {
    }
    /**
     * Simple mapping from iCalendar day names to day numbers.
     *
     * @var array
     */
    protected $dayMap = ['SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6];
    protected function getHours()
    {
    }
    protected function getDays()
    {
    }
    protected function getMonths()
    {
    }
}