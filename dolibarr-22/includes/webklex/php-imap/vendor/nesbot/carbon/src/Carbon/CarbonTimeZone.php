<?php

namespace Carbon;

class CarbonTimeZone extends \DateTimeZone
{
    public function __construct($timezone = null)
    {
    }
    protected static function parseNumericTimezone($timezone)
    {
    }
    protected static function getDateTimeZoneNameFromMixed($timezone)
    {
    }
    protected static function getDateTimeZoneFromName(&$name)
    {
    }
    /**
     * Cast the current instance into the given class.
     *
     * @param string $className The $className::instance() method will be called to cast the current object.
     *
     * @return DateTimeZone
     */
    public function cast(string $className)
    {
    }
    /**
     * Create a CarbonTimeZone from mixed input.
     *
     * @param DateTimeZone|string|int|null $object     original value to get CarbonTimeZone from it.
     * @param DateTimeZone|string|int|null $objectDump dump of the object for error messages.
     *
     * @throws InvalidTimeZoneException
     *
     * @return false|static
     */
    public static function instance($object = null, $objectDump = null)
    {
    }
    /**
     * Returns abbreviated name of the current timezone according to DST setting.
     *
     * @param bool $dst
     *
     * @return string
     */
    public function getAbbreviatedName($dst = false)
    {
    }
    /**
     * @alias getAbbreviatedName
     *
     * Returns abbreviated name of the current timezone according to DST setting.
     *
     * @param bool $dst
     *
     * @return string
     */
    public function getAbbr($dst = false)
    {
    }
    /**
     * Get the offset as string "sHH:MM" (such as "+00:00" or "-12:30").
     *
     * @param DateTimeInterface|null $date
     *
     * @return string
     */
    public function toOffsetName(\DateTimeInterface $date = null)
    {
    }
    /**
     * Returns a new CarbonTimeZone object using the offset string instead of region string.
     *
     * @param DateTimeInterface|null $date
     *
     * @return CarbonTimeZone
     */
    public function toOffsetTimeZone(\DateTimeInterface $date = null)
    {
    }
    /**
     * Returns the first region string (such as "America/Toronto") that matches the current timezone or
     * false if no match is found.
     *
     * @see timezone_name_from_abbr native PHP function.
     *
     * @param DateTimeInterface|null $date
     * @param int                    $isDst
     *
     * @return string|false
     */
    public function toRegionName(\DateTimeInterface $date = null, $isDst = 1)
    {
    }
    /**
     * Returns a new CarbonTimeZone object using the region string instead of offset string.
     *
     * @param DateTimeInterface|null $date
     *
     * @return CarbonTimeZone|false
     */
    public function toRegionTimeZone(\DateTimeInterface $date = null)
    {
    }
    /**
     * Cast to string (get timezone name).
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Return the type number:
     *
     * Type 1; A UTC offset, such as -0300
     * Type 2; A timezone abbreviation, such as GMT
     * Type 3: A timezone identifier, such as Europe/London
     */
    public function getType() : int
    {
    }
    /**
     * Create a CarbonTimeZone from mixed input.
     *
     * @param DateTimeZone|string|int|null $object
     *
     * @return false|static
     */
    public static function create($object = null)
    {
    }
    /**
     * Create a CarbonTimeZone from int/float hour offset.
     *
     * @param float $hourOffset number of hour of the timezone shift (can be decimal).
     *
     * @return false|static
     */
    public static function createFromHourOffset(float $hourOffset)
    {
    }
    /**
     * Create a CarbonTimeZone from int/float minute offset.
     *
     * @param float $minuteOffset number of total minutes of the timezone shift.
     *
     * @return false|static
     */
    public static function createFromMinuteOffset(float $minuteOffset)
    {
    }
    /**
     * Convert a total minutes offset into a standardized timezone offset string.
     *
     * @param float $minutes number of total minutes of the timezone shift.
     *
     * @return string
     */
    public static function getOffsetNameFromMinuteOffset(float $minutes) : string
    {
    }
}