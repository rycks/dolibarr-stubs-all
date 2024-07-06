<?php

namespace Carbon\Traits;

/**
 * Trait Creator.
 *
 * Static creators.
 *
 * Depends on the following methods:
 *
 * @method static Carbon|CarbonImmutable getTestNow()
 */
trait Creator
{
    use \Carbon\Traits\ObjectInitialisation;
    /**
     * The errors that can occur.
     *
     * @var array
     */
    protected static $lastErrors;
    /**
     * Create a new Carbon instance.
     *
     * Please see the testing aids section (specifically static::setTestNow())
     * for more on the possibility of this constructor returning a test instance.
     *
     * @param DateTimeInterface|string|null $time
     * @param DateTimeZone|string|null      $tz
     *
     * @throws InvalidFormatException
     */
    public function __construct($time = null, $tz = null)
    {
    }
    /**
     * Get timezone from a datetime instance.
     *
     * @param DateTimeInterface        $date
     * @param DateTimeZone|string|null $tz
     *
     * @return DateTimeInterface
     */
    private function constructTimezoneFromDateTime(\DateTimeInterface $date, &$tz)
    {
    }
    /**
     * Update constructedObjectId on cloned.
     */
    public function __clone()
    {
    }
    /**
     * Create a Carbon instance from a DateTime one.
     *
     * @param DateTimeInterface $date
     *
     * @return static
     */
    public static function instance($date)
    {
    }
    /**
     * Create a carbon instance from a string.
     *
     * This is an alias for the constructor that allows better fluent syntax
     * as it allows you to do Carbon::parse('Monday next week')->fn() rather
     * than (new Carbon('Monday next week'))->fn().
     *
     * @param string|DateTimeInterface|null $time
     * @param DateTimeZone|string|null      $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function rawParse($time = null, $tz = null)
    {
    }
    /**
     * Create a carbon instance from a string.
     *
     * This is an alias for the constructor that allows better fluent syntax
     * as it allows you to do Carbon::parse('Monday next week')->fn() rather
     * than (new Carbon('Monday next week'))->fn().
     *
     * @param string|DateTimeInterface|null $time
     * @param DateTimeZone|string|null      $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function parse($time = null, $tz = null)
    {
    }
    /**
     * Create a carbon instance from a localized string (in French, Japanese, Arabic, etc.).
     *
     * @param string                   $time   date/time string in the given language (may also contain English).
     * @param string|null              $locale if locale is null or not specified, current global locale will be
     *                                         used instead.
     * @param DateTimeZone|string|null $tz     optional timezone for the new instance.
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function parseFromLocale($time, $locale = null, $tz = null)
    {
    }
    /**
     * Get a Carbon instance for the current date and time.
     *
     * @param DateTimeZone|string|null $tz
     *
     * @return static
     */
    public static function now($tz = null)
    {
    }
    /**
     * Create a Carbon instance for today.
     *
     * @param DateTimeZone|string|null $tz
     *
     * @return static
     */
    public static function today($tz = null)
    {
    }
    /**
     * Create a Carbon instance for tomorrow.
     *
     * @param DateTimeZone|string|null $tz
     *
     * @return static
     */
    public static function tomorrow($tz = null)
    {
    }
    /**
     * Create a Carbon instance for yesterday.
     *
     * @param DateTimeZone|string|null $tz
     *
     * @return static
     */
    public static function yesterday($tz = null)
    {
    }
    /**
     * Create a Carbon instance for the greatest supported date.
     *
     * @return static
     */
    public static function maxValue()
    {
    }
    /**
     * Create a Carbon instance for the lowest supported date.
     *
     * @return static
     */
    public static function minValue()
    {
    }
    private static function assertBetween($unit, $value, $min, $max)
    {
    }
    private static function createNowInstance($tz)
    {
    }
    /**
     * Create a new Carbon instance from a specific date and time.
     *
     * If any of $year, $month or $day are set to null their now() values will
     * be used.
     *
     * If $hour is null it will be set to its now() value and the default
     * values for $minute and $second will be their now() values.
     *
     * If $hour is not null then the default values for $minute and $second
     * will be 0.
     *
     * @param int|null                 $year
     * @param int|null                 $month
     * @param int|null                 $day
     * @param int|null                 $hour
     * @param int|null                 $minute
     * @param int|null                 $second
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static|false
     */
    public static function create($year = 0, $month = 1, $day = 1, $hour = 0, $minute = 0, $second = 0, $tz = null)
    {
    }
    /**
     * Create a new safe Carbon instance from a specific date and time.
     *
     * If any of $year, $month or $day are set to null their now() values will
     * be used.
     *
     * If $hour is null it will be set to its now() value and the default
     * values for $minute and $second will be their now() values.
     *
     * If $hour is not null then the default values for $minute and $second
     * will be 0.
     *
     * If one of the set values is not valid, an InvalidDateException
     * will be thrown.
     *
     * @param int|null                 $year
     * @param int|null                 $month
     * @param int|null                 $day
     * @param int|null                 $hour
     * @param int|null                 $minute
     * @param int|null                 $second
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidDateException
     *
     * @return static|false
     */
    public static function createSafe($year = null, $month = null, $day = null, $hour = null, $minute = null, $second = null, $tz = null)
    {
    }
    /**
     * Create a new Carbon instance from a specific date and time using strict validation.
     *
     * @see create()
     *
     * @param int|null                 $year
     * @param int|null                 $month
     * @param int|null                 $day
     * @param int|null                 $hour
     * @param int|null                 $minute
     * @param int|null                 $second
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function createStrict(?int $year = 0, ?int $month = 1, ?int $day = 1, ?int $hour = 0, ?int $minute = 0, ?int $second = 0, $tz = null) : self
    {
    }
    /**
     * Create a Carbon instance from just a date. The time portion is set to now.
     *
     * @param int|null                 $year
     * @param int|null                 $month
     * @param int|null                 $day
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function createFromDate($year = null, $month = null, $day = null, $tz = null)
    {
    }
    /**
     * Create a Carbon instance from just a date. The time portion is set to midnight.
     *
     * @param int|null                 $year
     * @param int|null                 $month
     * @param int|null                 $day
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function createMidnightDate($year = null, $month = null, $day = null, $tz = null)
    {
    }
    /**
     * Create a Carbon instance from just a time. The date portion is set to today.
     *
     * @param int|null                 $hour
     * @param int|null                 $minute
     * @param int|null                 $second
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function createFromTime($hour = 0, $minute = 0, $second = 0, $tz = null)
    {
    }
    /**
     * Create a Carbon instance from a time string. The date portion is set to today.
     *
     * @param string                   $time
     * @param DateTimeZone|string|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function createFromTimeString($time, $tz = null)
    {
    }
    /**
     * @param string                         $format     Datetime format
     * @param string                         $time
     * @param DateTimeZone|string|false|null $originalTz
     *
     * @return DateTimeInterface|false
     */
    private static function createFromFormatAndTimezone($format, $time, $originalTz)
    {
    }
    /**
     * Create a Carbon instance from a specific format.
     *
     * @param string                         $format Datetime format
     * @param string                         $time
     * @param DateTimeZone|string|false|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static|false
     */
    public static function rawCreateFromFormat($format, $time, $tz = null)
    {
    }
    /**
     * Create a Carbon instance from a specific format.
     *
     * @param string                         $format Datetime format
     * @param string                         $time
     * @param DateTimeZone|string|false|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static|false
     */
    #[\ReturnTypeWillChange]
    public static function createFromFormat($format, $time, $tz = null)
    {
    }
    /**
     * Create a Carbon instance from a specific ISO format (same replacements as ->isoFormat()).
     *
     * @param string                                             $format     Datetime format
     * @param string                                             $time
     * @param DateTimeZone|string|false|null                     $tz         optional timezone
     * @param string|null                                        $locale     locale to be used for LTS, LT, LL, LLL, etc. macro-formats (en by fault, unneeded if no such macro-format in use)
     * @param \Symfony\Component\Translation\TranslatorInterface $translator optional custom translator to use for macro-formats
     *
     * @throws InvalidFormatException
     *
     * @return static|false
     */
    public static function createFromIsoFormat($format, $time, $tz = null, $locale = 'en', $translator = null)
    {
    }
    /**
     * Create a Carbon instance from a specific format and a string in a given language.
     *
     * @param string                         $format Datetime format
     * @param string                         $locale
     * @param string                         $time
     * @param DateTimeZone|string|false|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static|false
     */
    public static function createFromLocaleFormat($format, $locale, $time, $tz = null)
    {
    }
    /**
     * Create a Carbon instance from a specific ISO format and a string in a given language.
     *
     * @param string                         $format Datetime ISO format
     * @param string                         $locale
     * @param string                         $time
     * @param DateTimeZone|string|false|null $tz
     *
     * @throws InvalidFormatException
     *
     * @return static|false
     */
    public static function createFromLocaleIsoFormat($format, $locale, $time, $tz = null)
    {
    }
    /**
     * Make a Carbon instance from given variable if possible.
     *
     * Always return a new instance. Parse only strings and only these likely to be dates (skip intervals
     * and recurrences). Throw an exception for invalid format, but otherwise return null.
     *
     * @param mixed $var
     *
     * @throws InvalidFormatException
     *
     * @return static|null
     */
    public static function make($var)
    {
    }
    /**
     * Set last errors.
     *
     * @param array $lastErrors
     *
     * @return void
     */
    private static function setLastErrors(array $lastErrors)
    {
    }
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public static function getLastErrors()
    {
    }
}