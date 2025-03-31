<?php

namespace Carbon\Traits;

/**
 * Trait Modifiers.
 *
 * Returns dates relative to current date using modifier short-hand.
 */
trait Modifiers
{
    /**
     * Midday/noon hour.
     *
     * @var int
     */
    protected static $midDayAt = 12;
    /**
     * get midday/noon hour
     *
     * @return int
     */
    public static function getMidDayAt()
    {
    }
    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather consider mid-day is always 12pm, then if you need to test if it's an other
     *             hour, test it explicitly:
     *                 $date->format('G') == 13
     *             or to set explicitly to a given hour:
     *                 $date->setTime(13, 0, 0, 0)
     *
     * Set midday/noon hour
     *
     * @param int $hour midday hour
     *
     * @return void
     */
    public static function setMidDayAt($hour)
    {
    }
    /**
     * Modify to midday, default to self::$midDayAt
     *
     * @return static
     */
    public function midDay()
    {
    }
    /**
     * Modify to the next occurrence of a given modifier such as a day of
     * the week. If no modifier is provided, modify to the next occurrence
     * of the current day of the week. Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param string|int|null $modifier
     *
     * @return static
     */
    public function next($modifier = null)
    {
    }
    /**
     * Go forward or backward to the next week- or weekend-day.
     *
     * @param bool $weekday
     * @param bool $forward
     *
     * @return static
     */
    private function nextOrPreviousDay($weekday = true, $forward = true)
    {
    }
    /**
     * Go forward to the next weekday.
     *
     * @return static
     */
    public function nextWeekday()
    {
    }
    /**
     * Go backward to the previous weekday.
     *
     * @return static
     */
    public function previousWeekday()
    {
    }
    /**
     * Go forward to the next weekend day.
     *
     * @return static
     */
    public function nextWeekendDay()
    {
    }
    /**
     * Go backward to the previous weekend day.
     *
     * @return static
     */
    public function previousWeekendDay()
    {
    }
    /**
     * Modify to the previous occurrence of a given modifier such as a day of
     * the week. If no dayOfWeek is provided, modify to the previous occurrence
     * of the current day of the week. Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param string|int|null $modifier
     *
     * @return static
     */
    public function previous($modifier = null)
    {
    }
    /**
     * Modify to the first occurrence of a given day of the week
     * in the current month. If no dayOfWeek is provided, modify to the
     * first day of the current month.  Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int|null $dayOfWeek
     *
     * @return static
     */
    public function firstOfMonth($dayOfWeek = null)
    {
    }
    /**
     * Modify to the last occurrence of a given day of the week
     * in the current month. If no dayOfWeek is provided, modify to the
     * last day of the current month.  Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int|null $dayOfWeek
     *
     * @return static
     */
    public function lastOfMonth($dayOfWeek = null)
    {
    }
    /**
     * Modify to the given occurrence of a given day of the week
     * in the current month. If the calculated occurrence is outside the scope
     * of the current month, then return false and no modifications are made.
     * Use the supplied constants to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int $nth
     * @param int $dayOfWeek
     *
     * @return mixed
     */
    public function nthOfMonth($nth, $dayOfWeek)
    {
    }
    /**
     * Modify to the first occurrence of a given day of the week
     * in the current quarter. If no dayOfWeek is provided, modify to the
     * first day of the current quarter.  Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int|null $dayOfWeek day of the week default null
     *
     * @return static
     */
    public function firstOfQuarter($dayOfWeek = null)
    {
    }
    /**
     * Modify to the last occurrence of a given day of the week
     * in the current quarter. If no dayOfWeek is provided, modify to the
     * last day of the current quarter.  Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int|null $dayOfWeek day of the week default null
     *
     * @return static
     */
    public function lastOfQuarter($dayOfWeek = null)
    {
    }
    /**
     * Modify to the given occurrence of a given day of the week
     * in the current quarter. If the calculated occurrence is outside the scope
     * of the current quarter, then return false and no modifications are made.
     * Use the supplied constants to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int $nth
     * @param int $dayOfWeek
     *
     * @return mixed
     */
    public function nthOfQuarter($nth, $dayOfWeek)
    {
    }
    /**
     * Modify to the first occurrence of a given day of the week
     * in the current year. If no dayOfWeek is provided, modify to the
     * first day of the current year.  Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int|null $dayOfWeek day of the week default null
     *
     * @return static
     */
    public function firstOfYear($dayOfWeek = null)
    {
    }
    /**
     * Modify to the last occurrence of a given day of the week
     * in the current year. If no dayOfWeek is provided, modify to the
     * last day of the current year.  Use the supplied constants
     * to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int|null $dayOfWeek day of the week default null
     *
     * @return static
     */
    public function lastOfYear($dayOfWeek = null)
    {
    }
    /**
     * Modify to the given occurrence of a given day of the week
     * in the current year. If the calculated occurrence is outside the scope
     * of the current year, then return false and no modifications are made.
     * Use the supplied constants to indicate the desired dayOfWeek, ex. static::MONDAY.
     *
     * @param int $nth
     * @param int $dayOfWeek
     *
     * @return mixed
     */
    public function nthOfYear($nth, $dayOfWeek)
    {
    }
    /**
     * Modify the current instance to the average of a given instance (default now) and the current instance
     * (second-precision).
     *
     * @param \Carbon\Carbon|\DateTimeInterface|null $date
     *
     * @return static
     */
    public function average($date = null)
    {
    }
    /**
     * Get the closest date from the instance (second-precision).
     *
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date1
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date2
     *
     * @return static
     */
    public function closest($date1, $date2)
    {
    }
    /**
     * Get the farthest date from the instance (second-precision).
     *
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date1
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date2
     *
     * @return static
     */
    public function farthest($date1, $date2)
    {
    }
    /**
     * Get the minimum instance between a given instance (default now) and the current instance.
     *
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date
     *
     * @return static
     */
    public function min($date = null)
    {
    }
    /**
     * Get the minimum instance between a given instance (default now) and the current instance.
     *
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date
     *
     * @see min()
     *
     * @return static
     */
    public function minimum($date = null)
    {
    }
    /**
     * Get the maximum instance between a given instance (default now) and the current instance.
     *
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date
     *
     * @return static
     */
    public function max($date = null)
    {
    }
    /**
     * Get the maximum instance between a given instance (default now) and the current instance.
     *
     * @param \Carbon\Carbon|\DateTimeInterface|mixed $date
     *
     * @see max()
     *
     * @return static
     */
    public function maximum($date = null)
    {
    }
    /**
     * Calls \DateTime::modify if mutable or \DateTimeImmutable::modify else.
     *
     * @see https://php.net/manual/en/datetime.modify.php
     *
     * @return static|false
     */
    #[\ReturnTypeWillChange]
    public function modify($modify)
    {
    }
    /**
     * Similar to native modify() method of DateTime but can handle more grammars.
     *
     * @example
     * ```
     * echo Carbon::now()->change('next 2pm');
     * ```
     *
     * @link https://php.net/manual/en/datetime.modify.php
     *
     * @param string $modifier
     *
     * @return static
     */
    public function change($modifier)
    {
    }
}