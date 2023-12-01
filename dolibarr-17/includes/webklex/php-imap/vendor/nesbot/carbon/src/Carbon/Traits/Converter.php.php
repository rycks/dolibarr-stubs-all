<?php

namespace Carbon\Traits;

/**
 * Trait Converter.
 *
 * Change date into different string formats and types and
 * handle the string cast.
 *
 * Depends on the following methods:
 *
 * @method static copy()
 */
trait Converter
{
    /**
     * Format to use for __toString method when type juggling occurs.
     *
     * @var string|Closure|null
     */
    protected static $toStringFormat;
    /**
     * Reset the format used to the default when type juggling a Carbon instance to a string
     *
     * @return void
     */
    public static function resetToStringFormat()
    {
    }
    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather let Carbon object being casted to string with DEFAULT_TO_STRING_FORMAT, and
     *             use other method or custom format passed to format() method if you need to dump an other string
     *             format.
     *
     * Set the default format used when type juggling a Carbon instance to a string
     *
     * @param string|Closure|null $format
     *
     * @return void
     */
    public static function setToStringFormat($format)
    {
    }
    /**
     * Returns the formatted date string on success or FALSE on failure.
     *
     * @see https://php.net/manual/en/datetime.format.php
     *
     * @param string $format
     *
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function format($format)
    {
    }
    /**
     * @see https://php.net/manual/en/datetime.format.php
     *
     * @param string $format
     *
     * @return string
     */
    public function rawFormat($format)
    {
    }
    /**
     * Format the instance as a string using the set format
     *
     * @example
     * ```
     * echo Carbon::now(); // Carbon instances can be casted to string
     * ```
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Format the instance as date
     *
     * @example
     * ```
     * echo Carbon::now()->toDateString();
     * ```
     *
     * @return string
     */
    public function toDateString()
    {
    }
    /**
     * Format the instance as a readable date
     *
     * @example
     * ```
     * echo Carbon::now()->toFormattedDateString();
     * ```
     *
     * @return string
     */
    public function toFormattedDateString()
    {
    }
    /**
     * Format the instance as time
     *
     * @example
     * ```
     * echo Carbon::now()->toTimeString();
     * ```
     *
     * @param string $unitPrecision
     *
     * @return string
     */
    public function toTimeString($unitPrecision = 'second')
    {
    }
    /**
     * Format the instance as date and time
     *
     * @example
     * ```
     * echo Carbon::now()->toDateTimeString();
     * ```
     *
     * @param string $unitPrecision
     *
     * @return string
     */
    public function toDateTimeString($unitPrecision = 'second')
    {
    }
    /**
     * Return a format from H:i to H:i:s.u according to given unit precision.
     *
     * @param string $unitPrecision "minute", "second", "millisecond" or "microsecond"
     *
     * @return string
     */
    public static function getTimeFormatByPrecision($unitPrecision)
    {
    }
    /**
     * Format the instance as date and time T-separated with no timezone
     *
     * @example
     * ```
     * echo Carbon::now()->toDateTimeLocalString();
     * echo "\n";
     * echo Carbon::now()->toDateTimeLocalString('minute'); // You can specify precision among: minute, second, millisecond and microsecond
     * ```
     *
     * @param string $unitPrecision
     *
     * @return string
     */
    public function toDateTimeLocalString($unitPrecision = 'second')
    {
    }
    /**
     * Format the instance with day, date and time
     *
     * @example
     * ```
     * echo Carbon::now()->toDayDateTimeString();
     * ```
     *
     * @return string
     */
    public function toDayDateTimeString()
    {
    }
    /**
     * Format the instance as ATOM
     *
     * @example
     * ```
     * echo Carbon::now()->toAtomString();
     * ```
     *
     * @return string
     */
    public function toAtomString()
    {
    }
    /**
     * Format the instance as COOKIE
     *
     * @example
     * ```
     * echo Carbon::now()->toCookieString();
     * ```
     *
     * @return string
     */
    public function toCookieString()
    {
    }
    /**
     * Format the instance as ISO8601
     *
     * @example
     * ```
     * echo Carbon::now()->toIso8601String();
     * ```
     *
     * @return string
     */
    public function toIso8601String()
    {
    }
    /**
     * Format the instance as RFC822
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc822String();
     * ```
     *
     * @return string
     */
    public function toRfc822String()
    {
    }
    /**
     * Convert the instance to UTC and return as Zulu ISO8601
     *
     * @example
     * ```
     * echo Carbon::now()->toIso8601ZuluString();
     * ```
     *
     * @param string $unitPrecision
     *
     * @return string
     */
    public function toIso8601ZuluString($unitPrecision = 'second')
    {
    }
    /**
     * Format the instance as RFC850
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc850String();
     * ```
     *
     * @return string
     */
    public function toRfc850String()
    {
    }
    /**
     * Format the instance as RFC1036
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc1036String();
     * ```
     *
     * @return string
     */
    public function toRfc1036String()
    {
    }
    /**
     * Format the instance as RFC1123
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc1123String();
     * ```
     *
     * @return string
     */
    public function toRfc1123String()
    {
    }
    /**
     * Format the instance as RFC2822
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc2822String();
     * ```
     *
     * @return string
     */
    public function toRfc2822String()
    {
    }
    /**
     * Format the instance as RFC3339
     *
     * @param bool $extended
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc3339String() . "\n";
     * echo Carbon::now()->toRfc3339String(true) . "\n";
     * ```
     *
     * @return string
     */
    public function toRfc3339String($extended = false)
    {
    }
    /**
     * Format the instance as RSS
     *
     * @example
     * ```
     * echo Carbon::now()->toRssString();
     * ```
     *
     * @return string
     */
    public function toRssString()
    {
    }
    /**
     * Format the instance as W3C
     *
     * @example
     * ```
     * echo Carbon::now()->toW3cString();
     * ```
     *
     * @return string
     */
    public function toW3cString()
    {
    }
    /**
     * Format the instance as RFC7231
     *
     * @example
     * ```
     * echo Carbon::now()->toRfc7231String();
     * ```
     *
     * @return string
     */
    public function toRfc7231String()
    {
    }
    /**
     * Get default array representation.
     *
     * @example
     * ```
     * var_dump(Carbon::now()->toArray());
     * ```
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Get default object representation.
     *
     * @example
     * ```
     * var_dump(Carbon::now()->toObject());
     * ```
     *
     * @return object
     */
    public function toObject()
    {
    }
    /**
     * Returns english human readable complete date string.
     *
     * @example
     * ```
     * echo Carbon::now()->toString();
     * ```
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Return the ISO-8601 string (ex: 1977-04-22T06:00:00Z, if $keepOffset truthy, offset will be kept:
     * 1977-04-22T01:00:00-05:00).
     *
     * @example
     * ```
     * echo Carbon::now('America/Toronto')->toISOString() . "\n";
     * echo Carbon::now('America/Toronto')->toISOString(true) . "\n";
     * ```
     *
     * @param bool $keepOffset Pass true to keep the date offset. Else forced to UTC.
     *
     * @return null|string
     */
    public function toISOString($keepOffset = false)
    {
    }
    /**
     * Return the ISO-8601 string (ex: 1977-04-22T06:00:00Z) with UTC timezone.
     *
     * @example
     * ```
     * echo Carbon::now('America/Toronto')->toJSON();
     * ```
     *
     * @return null|string
     */
    public function toJSON()
    {
    }
    /**
     * Return native DateTime PHP object matching the current instance.
     *
     * @example
     * ```
     * var_dump(Carbon::now()->toDateTime());
     * ```
     *
     * @return DateTime
     */
    public function toDateTime()
    {
    }
    /**
     * Return native toDateTimeImmutable PHP object matching the current instance.
     *
     * @example
     * ```
     * var_dump(Carbon::now()->toDateTimeImmutable());
     * ```
     *
     * @return DateTimeImmutable
     */
    public function toDateTimeImmutable()
    {
    }
    /**
     * @alias toDateTime
     *
     * Return native DateTime PHP object matching the current instance.
     *
     * @example
     * ```
     * var_dump(Carbon::now()->toDate());
     * ```
     *
     * @return DateTime
     */
    public function toDate()
    {
    }
    /**
     * Create a iterable CarbonPeriod object from current date to a given end date (and optional interval).
     *
     * @param \DateTimeInterface|Carbon|CarbonImmutable|int|null $end      period end date or recurrences count if int
     * @param int|\DateInterval|string|null                      $interval period default interval or number of the given $unit
     * @param string|null                                        $unit     if specified, $interval must be an integer
     *
     * @return CarbonPeriod
     */
    public function toPeriod($end = null, $interval = null, $unit = null)
    {
    }
    /**
     * Create a iterable CarbonPeriod object from current date to a given end date (and optional interval).
     *
     * @param \DateTimeInterface|Carbon|CarbonImmutable|null $end      period end date
     * @param int|\DateInterval|string|null                  $interval period default interval or number of the given $unit
     * @param string|null                                    $unit     if specified, $interval must be an integer
     *
     * @return CarbonPeriod
     */
    public function range($end = null, $interval = null, $unit = null)
    {
    }
}