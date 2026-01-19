<?php

namespace Carbon;

/**
 * A simple API extension for DateInterval.
 * The implementation provides helpers to handle weeks but only days are saved.
 * Weeks are calculated based on the total days of the current instance.
 *
 * @property int $years Total years of the current interval.
 * @property int $months Total months of the current interval.
 * @property int $weeks Total weeks of the current interval calculated from the days.
 * @property int $dayz Total days of the current interval (weeks * 7 + days).
 * @property int $hours Total hours of the current interval.
 * @property int $minutes Total minutes of the current interval.
 * @property int $seconds Total seconds of the current interval.
 * @property int $microseconds Total microseconds of the current interval.
 * @property int $milliseconds Total microseconds of the current interval.
 * @property int $microExcludeMilli Remaining microseconds without the milliseconds.
 * @property int $dayzExcludeWeeks Total days remaining in the final week of the current instance (days % 7).
 * @property int $daysExcludeWeeks alias of dayzExcludeWeeks
 * @property-read float $totalYears Number of years equivalent to the interval.
 * @property-read float $totalMonths Number of months equivalent to the interval.
 * @property-read float $totalWeeks Number of weeks equivalent to the interval.
 * @property-read float $totalDays Number of days equivalent to the interval.
 * @property-read float $totalDayz Alias for totalDays.
 * @property-read float $totalHours Number of hours equivalent to the interval.
 * @property-read float $totalMinutes Number of minutes equivalent to the interval.
 * @property-read float $totalSeconds Number of seconds equivalent to the interval.
 * @property-read float $totalMilliseconds Number of milliseconds equivalent to the interval.
 * @property-read float $totalMicroseconds Number of microseconds equivalent to the interval.
 * @property-read string $locale locale of the current instance
 *
 * @method static CarbonInterval years($years = 1) Create instance specifying a number of years or modify the number of years if called on an instance.
 * @method static CarbonInterval year($years = 1) Alias for years()
 * @method static CarbonInterval months($months = 1) Create instance specifying a number of months or modify the number of months if called on an instance.
 * @method static CarbonInterval month($months = 1) Alias for months()
 * @method static CarbonInterval weeks($weeks = 1) Create instance specifying a number of weeks or modify the number of weeks if called on an instance.
 * @method static CarbonInterval week($weeks = 1) Alias for weeks()
 * @method static CarbonInterval days($days = 1) Create instance specifying a number of days or modify the number of days if called on an instance.
 * @method static CarbonInterval dayz($days = 1) Alias for days()
 * @method static CarbonInterval daysExcludeWeeks($days = 1) Create instance specifying a number of days or modify the number of days (keeping the current number of weeks) if called on an instance.
 * @method static CarbonInterval dayzExcludeWeeks($days = 1) Alias for daysExcludeWeeks()
 * @method static CarbonInterval day($days = 1) Alias for days()
 * @method static CarbonInterval hours($hours = 1) Create instance specifying a number of hours or modify the number of hours if called on an instance.
 * @method static CarbonInterval hour($hours = 1) Alias for hours()
 * @method static CarbonInterval minutes($minutes = 1) Create instance specifying a number of minutes or modify the number of minutes if called on an instance.
 * @method static CarbonInterval minute($minutes = 1) Alias for minutes()
 * @method static CarbonInterval seconds($seconds = 1) Create instance specifying a number of seconds or modify the number of seconds if called on an instance.
 * @method static CarbonInterval second($seconds = 1) Alias for seconds()
 * @method static CarbonInterval milliseconds($milliseconds = 1) Create instance specifying a number of milliseconds or modify the number of milliseconds if called on an instance.
 * @method static CarbonInterval millisecond($milliseconds = 1) Alias for milliseconds()
 * @method static CarbonInterval microseconds($microseconds = 1) Create instance specifying a number of microseconds or modify the number of microseconds if called on an instance.
 * @method static CarbonInterval microsecond($microseconds = 1) Alias for microseconds()
 * @method $this addYears(int $years) Add given number of years to the current interval
 * @method $this subYears(int $years) Subtract given number of years to the current interval
 * @method $this addMonths(int $months) Add given number of months to the current interval
 * @method $this subMonths(int $months) Subtract given number of months to the current interval
 * @method $this addWeeks(int|float $weeks) Add given number of weeks to the current interval
 * @method $this subWeeks(int|float $weeks) Subtract given number of weeks to the current interval
 * @method $this addDays(int|float $days) Add given number of days to the current interval
 * @method $this subDays(int|float $days) Subtract given number of days to the current interval
 * @method $this addHours(int|float $hours) Add given number of hours to the current interval
 * @method $this subHours(int|float $hours) Subtract given number of hours to the current interval
 * @method $this addMinutes(int|float $minutes) Add given number of minutes to the current interval
 * @method $this subMinutes(int|float $minutes) Subtract given number of minutes to the current interval
 * @method $this addSeconds(int|float $seconds) Add given number of seconds to the current interval
 * @method $this subSeconds(int|float $seconds) Subtract given number of seconds to the current interval
 * @method $this addMilliseconds(int|float $milliseconds) Add given number of milliseconds to the current interval
 * @method $this subMilliseconds(int|float $milliseconds) Subtract given number of milliseconds to the current interval
 * @method $this addMicroseconds(int|float $microseconds) Add given number of microseconds to the current interval
 * @method $this subMicroseconds(int|float $microseconds) Subtract given number of microseconds to the current interval
 * @method $this roundYear(int|float $precision = 1, string $function = "round") Round the current instance year with given precision using the given function.
 * @method $this roundYears(int|float $precision = 1, string $function = "round") Round the current instance year with given precision using the given function.
 * @method $this floorYear(int|float $precision = 1) Truncate the current instance year with given precision.
 * @method $this floorYears(int|float $precision = 1) Truncate the current instance year with given precision.
 * @method $this ceilYear(int|float $precision = 1) Ceil the current instance year with given precision.
 * @method $this ceilYears(int|float $precision = 1) Ceil the current instance year with given precision.
 * @method $this roundMonth(int|float $precision = 1, string $function = "round") Round the current instance month with given precision using the given function.
 * @method $this roundMonths(int|float $precision = 1, string $function = "round") Round the current instance month with given precision using the given function.
 * @method $this floorMonth(int|float $precision = 1) Truncate the current instance month with given precision.
 * @method $this floorMonths(int|float $precision = 1) Truncate the current instance month with given precision.
 * @method $this ceilMonth(int|float $precision = 1) Ceil the current instance month with given precision.
 * @method $this ceilMonths(int|float $precision = 1) Ceil the current instance month with given precision.
 * @method $this roundWeek(int|float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this roundWeeks(int|float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this floorWeek(int|float $precision = 1) Truncate the current instance day with given precision.
 * @method $this floorWeeks(int|float $precision = 1) Truncate the current instance day with given precision.
 * @method $this ceilWeek(int|float $precision = 1) Ceil the current instance day with given precision.
 * @method $this ceilWeeks(int|float $precision = 1) Ceil the current instance day with given precision.
 * @method $this roundDay(int|float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this roundDays(int|float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this floorDay(int|float $precision = 1) Truncate the current instance day with given precision.
 * @method $this floorDays(int|float $precision = 1) Truncate the current instance day with given precision.
 * @method $this ceilDay(int|float $precision = 1) Ceil the current instance day with given precision.
 * @method $this ceilDays(int|float $precision = 1) Ceil the current instance day with given precision.
 * @method $this roundHour(int|float $precision = 1, string $function = "round") Round the current instance hour with given precision using the given function.
 * @method $this roundHours(int|float $precision = 1, string $function = "round") Round the current instance hour with given precision using the given function.
 * @method $this floorHour(int|float $precision = 1) Truncate the current instance hour with given precision.
 * @method $this floorHours(int|float $precision = 1) Truncate the current instance hour with given precision.
 * @method $this ceilHour(int|float $precision = 1) Ceil the current instance hour with given precision.
 * @method $this ceilHours(int|float $precision = 1) Ceil the current instance hour with given precision.
 * @method $this roundMinute(int|float $precision = 1, string $function = "round") Round the current instance minute with given precision using the given function.
 * @method $this roundMinutes(int|float $precision = 1, string $function = "round") Round the current instance minute with given precision using the given function.
 * @method $this floorMinute(int|float $precision = 1) Truncate the current instance minute with given precision.
 * @method $this floorMinutes(int|float $precision = 1) Truncate the current instance minute with given precision.
 * @method $this ceilMinute(int|float $precision = 1) Ceil the current instance minute with given precision.
 * @method $this ceilMinutes(int|float $precision = 1) Ceil the current instance minute with given precision.
 * @method $this roundSecond(int|float $precision = 1, string $function = "round") Round the current instance second with given precision using the given function.
 * @method $this roundSeconds(int|float $precision = 1, string $function = "round") Round the current instance second with given precision using the given function.
 * @method $this floorSecond(int|float $precision = 1) Truncate the current instance second with given precision.
 * @method $this floorSeconds(int|float $precision = 1) Truncate the current instance second with given precision.
 * @method $this ceilSecond(int|float $precision = 1) Ceil the current instance second with given precision.
 * @method $this ceilSeconds(int|float $precision = 1) Ceil the current instance second with given precision.
 * @method $this roundMillennium(int|float $precision = 1, string $function = "round") Round the current instance millennium with given precision using the given function.
 * @method $this roundMillennia(int|float $precision = 1, string $function = "round") Round the current instance millennium with given precision using the given function.
 * @method $this floorMillennium(int|float $precision = 1) Truncate the current instance millennium with given precision.
 * @method $this floorMillennia(int|float $precision = 1) Truncate the current instance millennium with given precision.
 * @method $this ceilMillennium(int|float $precision = 1) Ceil the current instance millennium with given precision.
 * @method $this ceilMillennia(int|float $precision = 1) Ceil the current instance millennium with given precision.
 * @method $this roundCentury(int|float $precision = 1, string $function = "round") Round the current instance century with given precision using the given function.
 * @method $this roundCenturies(int|float $precision = 1, string $function = "round") Round the current instance century with given precision using the given function.
 * @method $this floorCentury(int|float $precision = 1) Truncate the current instance century with given precision.
 * @method $this floorCenturies(int|float $precision = 1) Truncate the current instance century with given precision.
 * @method $this ceilCentury(int|float $precision = 1) Ceil the current instance century with given precision.
 * @method $this ceilCenturies(int|float $precision = 1) Ceil the current instance century with given precision.
 * @method $this roundDecade(int|float $precision = 1, string $function = "round") Round the current instance decade with given precision using the given function.
 * @method $this roundDecades(int|float $precision = 1, string $function = "round") Round the current instance decade with given precision using the given function.
 * @method $this floorDecade(int|float $precision = 1) Truncate the current instance decade with given precision.
 * @method $this floorDecades(int|float $precision = 1) Truncate the current instance decade with given precision.
 * @method $this ceilDecade(int|float $precision = 1) Ceil the current instance decade with given precision.
 * @method $this ceilDecades(int|float $precision = 1) Ceil the current instance decade with given precision.
 * @method $this roundQuarter(int|float $precision = 1, string $function = "round") Round the current instance quarter with given precision using the given function.
 * @method $this roundQuarters(int|float $precision = 1, string $function = "round") Round the current instance quarter with given precision using the given function.
 * @method $this floorQuarter(int|float $precision = 1) Truncate the current instance quarter with given precision.
 * @method $this floorQuarters(int|float $precision = 1) Truncate the current instance quarter with given precision.
 * @method $this ceilQuarter(int|float $precision = 1) Ceil the current instance quarter with given precision.
 * @method $this ceilQuarters(int|float $precision = 1) Ceil the current instance quarter with given precision.
 * @method $this roundMillisecond(int|float $precision = 1, string $function = "round") Round the current instance millisecond with given precision using the given function.
 * @method $this roundMilliseconds(int|float $precision = 1, string $function = "round") Round the current instance millisecond with given precision using the given function.
 * @method $this floorMillisecond(int|float $precision = 1) Truncate the current instance millisecond with given precision.
 * @method $this floorMilliseconds(int|float $precision = 1) Truncate the current instance millisecond with given precision.
 * @method $this ceilMillisecond(int|float $precision = 1) Ceil the current instance millisecond with given precision.
 * @method $this ceilMilliseconds(int|float $precision = 1) Ceil the current instance millisecond with given precision.
 * @method $this roundMicrosecond(int|float $precision = 1, string $function = "round") Round the current instance microsecond with given precision using the given function.
 * @method $this roundMicroseconds(int|float $precision = 1, string $function = "round") Round the current instance microsecond with given precision using the given function.
 * @method $this floorMicrosecond(int|float $precision = 1) Truncate the current instance microsecond with given precision.
 * @method $this floorMicroseconds(int|float $precision = 1) Truncate the current instance microsecond with given precision.
 * @method $this ceilMicrosecond(int|float $precision = 1) Ceil the current instance microsecond with given precision.
 * @method $this ceilMicroseconds(int|float $precision = 1) Ceil the current instance microsecond with given precision.
 */
class CarbonInterval extends \DateInterval implements \Carbon\CarbonConverterInterface
{
    use \Carbon\Traits\IntervalRounding;
    use \Carbon\Traits\IntervalStep;
    use \Carbon\Traits\Mixin {
        \Carbon\Traits\Mixin::mixin as baseMixin;
    }
    use \Carbon\Traits\Options;
    /**
     * Interval spec period designators
     */
    public const PERIOD_PREFIX = 'P';
    public const PERIOD_YEARS = 'Y';
    public const PERIOD_MONTHS = 'M';
    public const PERIOD_DAYS = 'D';
    public const PERIOD_TIME_PREFIX = 'T';
    public const PERIOD_HOURS = 'H';
    public const PERIOD_MINUTES = 'M';
    public const PERIOD_SECONDS = 'S';
    /**
     * A translator to ... er ... translate stuff
     *
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    protected static $translator;
    /**
     * @var array|null
     */
    protected static $cascadeFactors;
    /**
     * @var array
     */
    protected static $formats = ['y' => 'y', 'Y' => 'y', 'o' => 'y', 'm' => 'm', 'n' => 'm', 'W' => 'weeks', 'd' => 'd', 'j' => 'd', 'z' => 'd', 'h' => 'h', 'g' => 'h', 'H' => 'h', 'G' => 'h', 'i' => 'i', 's' => 's', 'u' => 'micro', 'v' => 'milli'];
    /**
     * @var array|null
     */
    private static $flipCascadeFactors;
    /**
     * The registered macros.
     *
     * @var array
     */
    protected static $macros = [];
    /**
     * Timezone handler for settings() method.
     *
     * @var mixed
     */
    protected $tzName;
    /**
     * Set the instance's timezone from a string or object.
     *
     * @param \DateTimeZone|string $tzName
     *
     * @return static
     */
    public function setTimezone($tzName)
    {
    }
    /**
     * @internal
     *
     * Set the instance's timezone from a string or object and add/subtract the offset difference.
     *
     * @param \DateTimeZone|string $tzName
     *
     * @return static
     */
    public function shiftTimezone($tzName)
    {
    }
    /**
     * Mapping of units and factors for cascading.
     *
     * Should only be modified by changing the factors or referenced constants.
     *
     * @return array
     */
    public static function getCascadeFactors()
    {
    }
    private static function standardizeUnit($unit)
    {
    }
    private static function getFlipCascadeFactors()
    {
    }
    /**
     * Set default cascading factors for ->cascade() method.
     *
     * @param array $cascadeFactors
     */
    public static function setCascadeFactors(array $cascadeFactors)
    {
    }
    ///////////////////////////////////////////////////////////////////
    //////////////////////////// CONSTRUCTORS /////////////////////////
    ///////////////////////////////////////////////////////////////////
    /**
     * Create a new CarbonInterval instance.
     *
     * @param Closure|DateInterval|string|int|null $years
     * @param int|null                             $months
     * @param int|null                             $weeks
     * @param int|null                             $days
     * @param int|null                             $hours
     * @param int|null                             $minutes
     * @param int|null                             $seconds
     * @param int|null                             $microseconds
     *
     * @throws Exception when the interval_spec (passed as $years) cannot be parsed as an interval.
     */
    public function __construct($years = 1, $months = null, $weeks = null, $days = null, $hours = null, $minutes = null, $seconds = null, $microseconds = null)
    {
    }
    /**
     * Returns the factor for a given source-to-target couple.
     *
     * @param string $source
     * @param string $target
     *
     * @return int|null
     */
    public static function getFactor($source, $target)
    {
    }
    /**
     * Returns the factor for a given source-to-target couple if set,
     * else try to find the appropriate constant as the factor, such as Carbon::DAYS_PER_WEEK.
     *
     * @param string $source
     * @param string $target
     *
     * @return int|null
     */
    public static function getFactorWithDefault($source, $target)
    {
    }
    /**
     * Returns current config for days per week.
     *
     * @return int
     */
    public static function getDaysPerWeek()
    {
    }
    /**
     * Returns current config for hours per day.
     *
     * @return int
     */
    public static function getHoursPerDay()
    {
    }
    /**
     * Returns current config for minutes per hour.
     *
     * @return int
     */
    public static function getMinutesPerHour()
    {
    }
    /**
     * Returns current config for seconds per minute.
     *
     * @return int
     */
    public static function getSecondsPerMinute()
    {
    }
    /**
     * Returns current config for microseconds per second.
     *
     * @return int
     */
    public static function getMillisecondsPerSecond()
    {
    }
    /**
     * Returns current config for microseconds per second.
     *
     * @return int
     */
    public static function getMicrosecondsPerMillisecond()
    {
    }
    /**
     * Create a new CarbonInterval instance from specific values.
     * This is an alias for the constructor that allows better fluent
     * syntax as it allows you to do CarbonInterval::create(1)->fn() rather than
     * (new CarbonInterval(1))->fn().
     *
     * @param int $years
     * @param int $months
     * @param int $weeks
     * @param int $days
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
     * @param int $microseconds
     *
     * @throws Exception when the interval_spec (passed as $years) cannot be parsed as an interval.
     *
     * @return static
     */
    public static function create($years = 1, $months = null, $weeks = null, $days = null, $hours = null, $minutes = null, $seconds = null, $microseconds = null)
    {
    }
    /**
     * Parse a string into a new CarbonInterval object according to the specified format.
     *
     * @example
     * ```
     * echo Carboninterval::createFromFormat('H:i', '1:30');
     * ```
     *
     * @param string      $format   Format of the $interval input string
     * @param string|null $interval Input string to convert into an interval
     *
     * @throws \Carbon\Exceptions\ParseErrorException when the $interval cannot be parsed as an interval.
     *
     * @return static
     */
    public static function createFromFormat(string $format, ?string $interval)
    {
    }
    /**
     * Get a copy of the instance.
     *
     * @return static
     */
    public function copy()
    {
    }
    /**
     * Get a copy of the instance.
     *
     * @return static
     */
    public function clone()
    {
    }
    /**
     * Provide static helpers to create instances.  Allows CarbonInterval::years(3).
     *
     * Note: This is done using the magic method to allow static and instance methods to
     *       have the same names.
     *
     * @param string $method     magic method name called
     * @param array  $parameters parameters list
     *
     * @return static|null
     */
    public static function __callStatic($method, $parameters)
    {
    }
    /**
     * Return the current context from inside a macro callee or a new one if static.
     *
     * @return static
     */
    protected static function this()
    {
    }
    /**
     * Creates a CarbonInterval from string.
     *
     * Format:
     *
     * Suffix | Unit    | Example | DateInterval expression
     * -------|---------|---------|------------------------
     * y      | years   |   1y    | P1Y
     * mo     | months  |   3mo   | P3M
     * w      | weeks   |   2w    | P2W
     * d      | days    |  28d    | P28D
     * h      | hours   |   4h    | PT4H
     * m      | minutes |  12m    | PT12M
     * s      | seconds |  59s    | PT59S
     *
     * e. g. `1w 3d 4h 32m 23s` is converted to 10 days 4 hours 32 minutes and 23 seconds.
     *
     * Special cases:
     *  - An empty string will return a zero interval
     *  - Fractions are allowed for weeks, days, hours and minutes and will be converted
     *    and rounded to the next smaller value (caution: 0.5w = 4d)
     *
     * @param string $intervalDefinition
     *
     * @return static
     */
    public static function fromString($intervalDefinition)
    {
    }
    /**
     * Creates a CarbonInterval from string using a different locale.
     *
     * @param string      $interval interval string in the given language (may also contain English).
     * @param string|null $locale   if locale is null or not specified, current global locale will be used instead.
     *
     * @return static
     */
    public static function parseFromLocale($interval, $locale = null)
    {
    }
    private static function castIntervalToClass(\DateInterval $interval, string $className)
    {
    }
    private static function copyNegativeUnits(\DateInterval $from, \DateInterval $to) : void
    {
    }
    private static function copyStep(self $from, self $to) : void
    {
    }
    /**
     * Cast the current instance into the given class.
     *
     * @param string $className The $className::instance() method will be called to cast the current object.
     *
     * @return DateInterval
     */
    public function cast(string $className)
    {
    }
    /**
     * Create a CarbonInterval instance from a DateInterval one.  Can not instance
     * DateInterval objects created from DateTime::diff() as you can't externally
     * set the $days field.
     *
     * @param DateInterval $interval
     *
     * @return static
     */
    public static function instance(\DateInterval $interval)
    {
    }
    /**
     * Make a CarbonInterval instance from given variable if possible.
     *
     * Always return a new instance. Parse only strings and only these likely to be intervals (skip dates
     * and recurrences). Throw an exception for invalid format, but otherwise return null.
     *
     * @param mixed|int|DateInterval|string|Closure|null $interval interval or number of the given $unit
     * @param string|null                                $unit     if specified, $interval must be an integer
     *
     * @return static|null
     */
    public static function make($interval, $unit = null)
    {
    }
    protected static function makeFromString(string $interval)
    {
    }
    protected function resolveInterval($interval)
    {
    }
    /**
     * Sets up a DateInterval from the relative parts of the string.
     *
     * @param string $time
     *
     * @return static
     *
     * @link https://php.net/manual/en/dateinterval.createfromdatestring.php
     */
    #[\ReturnTypeWillChange]
    public static function createFromDateString($time)
    {
    }
    ///////////////////////////////////////////////////////////////////
    ///////////////////////// GETTERS AND SETTERS /////////////////////
    ///////////////////////////////////////////////////////////////////
    /**
     * Get a part of the CarbonInterval object.
     *
     * @param string $name
     *
     * @throws UnknownGetterException
     *
     * @return int|float|string
     */
    public function get($name)
    {
    }
    /**
     * Get a part of the CarbonInterval object.
     *
     * @param string $name
     *
     * @throws UnknownGetterException
     *
     * @return int|float|string
     */
    public function __get($name)
    {
    }
    /**
     * Set a part of the CarbonInterval object.
     *
     * @param string|array $name
     * @param int          $value
     *
     * @throws UnknownSetterException
     *
     * @return $this
     */
    public function set($name, $value = null)
    {
    }
    /**
     * Set a part of the CarbonInterval object.
     *
     * @param string $name
     * @param int    $value
     *
     * @throws UnknownSetterException
     */
    public function __set($name, $value)
    {
    }
    /**
     * Allow setting of weeks and days to be cumulative.
     *
     * @param int $weeks Number of weeks to set
     * @param int $days  Number of days to set
     *
     * @return static
     */
    public function weeksAndDays($weeks, $days)
    {
    }
    /**
     * Returns true if the interval is empty for each unit.
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * Register a custom macro.
     *
     * @example
     * ```
     * CarbonInterval::macro('twice', function () {
     *   return $this->times(2);
     * });
     * echo CarbonInterval::hours(2)->twice();
     * ```
     *
     * @param string          $name
     * @param object|callable $macro
     *
     * @return void
     */
    public static function macro($name, $macro)
    {
    }
    /**
     * Register macros from a mixin object.
     *
     * @example
     * ```
     * CarbonInterval::mixin(new class {
     *   public function daysToHours() {
     *     return function () {
     *       $this->hours += $this->days;
     *       $this->days = 0;
     *
     *       return $this;
     *     };
     *   }
     *   public function hoursToDays() {
     *     return function () {
     *       $this->days += $this->hours;
     *       $this->hours = 0;
     *
     *       return $this;
     *     };
     *   }
     * });
     * echo CarbonInterval::hours(5)->hoursToDays() . "\n";
     * echo CarbonInterval::days(5)->daysToHours() . "\n";
     * ```
     *
     * @param object|string $mixin
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public static function mixin($mixin)
    {
    }
    /**
     * Check if macro is registered.
     *
     * @param string $name
     *
     * @return bool
     */
    public static function hasMacro($name)
    {
    }
    /**
     * Call given macro.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function callMacro($name, $parameters)
    {
    }
    /**
     * Allow fluent calls on the setters... CarbonInterval::years(3)->months(5)->day().
     *
     * Note: This is done using the magic method to allow static and instance methods to
     *       have the same names.
     *
     * @param string $method     magic method name called
     * @param array  $parameters parameters list
     *
     * @throws BadFluentSetterException|Throwable
     *
     * @return static
     */
    public function __call($method, $parameters)
    {
    }
    protected function getForHumansInitialVariables($syntax, $short)
    {
    }
    /**
     * @param mixed $syntax
     * @param mixed $short
     * @param mixed $parts
     * @param mixed $options
     *
     * @return array
     */
    protected function getForHumansParameters($syntax = null, $short = false, $parts = -1, $options = null)
    {
    }
    protected static function getRoundingMethodFromOptions(int $options) : ?string
    {
    }
    /**
     * Returns interval values as an array where key are the unit names and values the counts.
     *
     * @return int[]
     */
    public function toArray()
    {
    }
    /**
     * Returns interval non-zero values as an array where key are the unit names and values the counts.
     *
     * @return int[]
     */
    public function getNonZeroValues()
    {
    }
    /**
     * Returns interval values as an array where key are the unit names and values the counts
     * from the biggest non-zero one the the smallest non-zero one.
     *
     * @return int[]
     */
    public function getValuesSequence()
    {
    }
    /**
     * Get the current interval in a human readable format in the current locale.
     *
     * @example
     * ```
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans() . "\n";
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans(['parts' => 2]) . "\n";
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans(['parts' => 3, 'join' => true]) . "\n";
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans(['short' => true]) . "\n";
     * echo CarbonInterval::fromString('1d 24h')->forHumans(['join' => ' or ']) . "\n";
     * echo CarbonInterval::fromString('1d 24h')->forHumans(['minimumUnit' => 'hour']) . "\n";
     * ```
     *
     * @param int|array $syntax  if array passed, parameters will be extracted from it, the array may contains:
     *                           - 'syntax' entry (see below)
     *                           - 'short' entry (see below)
     *                           - 'parts' entry (see below)
     *                           - 'options' entry (see below)
     *                           - 'skip' entry, list of units to skip (array of strings or a single string,
     *                           ` it can be the unit name (singular or plural) or its shortcut
     *                           ` (y, m, w, d, h, min, s, ms, µs).
     *                           - 'aUnit' entry, prefer "an hour" over "1 hour" if true
     *                           - 'join' entry determines how to join multiple parts of the string
     *                           `  - if $join is a string, it's used as a joiner glue
     *                           `  - if $join is a callable/closure, it get the list of string and should return a string
     *                           `  - if $join is an array, the first item will be the default glue, and the second item
     *                           `    will be used instead of the glue for the last item
     *                           `  - if $join is true, it will be guessed from the locale ('list' translation file entry)
     *                           `  - if $join is missing, a space will be used as glue
     *                           - 'minimumUnit' entry determines the smallest unit of time to display can be long or
     *                           `  short form of the units, e.g. 'hour' or 'h' (default value: s)
     *                           if int passed, it add modifiers:
     *                           Possible values:
     *                           - CarbonInterface::DIFF_ABSOLUTE          no modifiers
     *                           - CarbonInterface::DIFF_RELATIVE_TO_NOW   add ago/from now modifier
     *                           - CarbonInterface::DIFF_RELATIVE_TO_OTHER add before/after modifier
     *                           Default value: CarbonInterface::DIFF_ABSOLUTE
     * @param bool      $short   displays short format of time units
     * @param int       $parts   maximum number of parts to display (default value: -1: no limits)
     * @param int       $options human diff options
     *
     * @throws Exception
     *
     * @return string
     */
    public function forHumans($syntax = null, $short = false, $parts = -1, $options = null)
    {
    }
    /**
     * Format the instance as a string using the forHumans() function.
     *
     * @throws Exception
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Return native DateInterval PHP object matching the current instance.
     *
     * @example
     * ```
     * var_dump(CarbonInterval::hours(2)->toDateInterval());
     * ```
     *
     * @return DateInterval
     */
    public function toDateInterval()
    {
    }
    /**
     * Convert the interval to a CarbonPeriod.
     *
     * @param DateTimeInterface|string|int ...$params Start date, [end date or recurrences] and optional settings.
     *
     * @return CarbonPeriod
     */
    public function toPeriod(...$params)
    {
    }
    /**
     * Invert the interval.
     *
     * @param bool|int $inverted if a parameter is passed, the passed value casted as 1 or 0 is used
     *                           as the new value of the ->invert property.
     *
     * @return $this
     */
    public function invert($inverted = null)
    {
    }
    protected function solveNegativeInterval()
    {
    }
    /**
     * Add the passed interval to the current instance.
     *
     * @param string|DateInterval $unit
     * @param int|float           $value
     *
     * @return $this
     */
    public function add($unit, $value = 1)
    {
    }
    /**
     * Subtract the passed interval to the current instance.
     *
     * @param string|DateInterval $unit
     * @param int|float           $value
     *
     * @return $this
     */
    public function sub($unit, $value = 1)
    {
    }
    /**
     * Subtract the passed interval to the current instance.
     *
     * @param string|DateInterval $unit
     * @param int|float           $value
     *
     * @return $this
     */
    public function subtract($unit, $value = 1)
    {
    }
    /**
     * Add given parameters to the current interval.
     *
     * @param int       $years
     * @param int       $months
     * @param int|float $weeks
     * @param int|float $days
     * @param int|float $hours
     * @param int|float $minutes
     * @param int|float $seconds
     * @param int|float $microseconds
     *
     * @return $this
     */
    public function plus($years = 0, $months = 0, $weeks = 0, $days = 0, $hours = 0, $minutes = 0, $seconds = 0, $microseconds = 0) : self
    {
    }
    /**
     * Add given parameters to the current interval.
     *
     * @param int       $years
     * @param int       $months
     * @param int|float $weeks
     * @param int|float $days
     * @param int|float $hours
     * @param int|float $minutes
     * @param int|float $seconds
     * @param int|float $microseconds
     *
     * @return $this
     */
    public function minus($years = 0, $months = 0, $weeks = 0, $days = 0, $hours = 0, $minutes = 0, $seconds = 0, $microseconds = 0) : self
    {
    }
    /**
     * Multiply current instance given number of times. times() is naive, it multiplies each unit
     * (so day can be greater than 31, hour can be greater than 23, etc.) and the result is rounded
     * separately for each unit.
     *
     * Use times() when you want a fast and approximated calculation that does not cascade units.
     *
     * For a precise and cascaded calculation,
     *
     * @see multiply()
     *
     * @param float|int $factor
     *
     * @return $this
     */
    public function times($factor)
    {
    }
    /**
     * Divide current instance by a given divider. shares() is naive, it divides each unit separately
     * and the result is rounded for each unit. So 5 hours and 20 minutes shared by 3 becomes 2 hours
     * and 7 minutes.
     *
     * Use shares() when you want a fast and approximated calculation that does not cascade units.
     *
     * For a precise and cascaded calculation,
     *
     * @see divide()
     *
     * @param float|int $divider
     *
     * @return $this
     */
    public function shares($divider)
    {
    }
    protected function copyProperties(self $interval, $ignoreSign = false)
    {
    }
    /**
     * Multiply and cascade current instance by a given factor.
     *
     * @param float|int $factor
     *
     * @return $this
     */
    public function multiply($factor)
    {
    }
    /**
     * Divide and cascade current instance by a given divider.
     *
     * @param float|int $divider
     *
     * @return $this
     */
    public function divide($divider)
    {
    }
    /**
     * Get the interval_spec string of a date interval.
     *
     * @param DateInterval $interval
     *
     * @return string
     */
    public static function getDateIntervalSpec(\DateInterval $interval, bool $microseconds = false)
    {
    }
    /**
     * Get the interval_spec string.
     *
     * @return string
     */
    public function spec(bool $microseconds = false)
    {
    }
    /**
     * Comparing 2 date intervals.
     *
     * @param DateInterval $first
     * @param DateInterval $second
     *
     * @return int
     */
    public static function compareDateIntervals(\DateInterval $first, \DateInterval $second)
    {
    }
    /**
     * Comparing with passed interval.
     *
     * @param DateInterval $interval
     *
     * @return int
     */
    public function compare(\DateInterval $interval)
    {
    }
    private function invertCascade(array $values)
    {
    }
    private function doCascade(bool $deep)
    {
    }
    /**
     * Convert overflowed values into bigger units.
     *
     * @return $this
     */
    public function cascade()
    {
    }
    public function hasNegativeValues() : bool
    {
    }
    public function hasPositiveValues() : bool
    {
    }
    /**
     * Get amount of given unit equivalent to the interval.
     *
     * @param string $unit
     *
     * @throws UnknownUnitException|UnitNotConfiguredException
     *
     * @return float
     */
    public function total($unit)
    {
    }
    /**
     * Determines if the instance is equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @see equalTo()
     *
     * @return bool
     */
    public function eq($interval) : bool
    {
    }
    /**
     * Determines if the instance is equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @return bool
     */
    public function equalTo($interval) : bool
    {
    }
    /**
     * Determines if the instance is not equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @see notEqualTo()
     *
     * @return bool
     */
    public function ne($interval) : bool
    {
    }
    /**
     * Determines if the instance is not equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @return bool
     */
    public function notEqualTo($interval) : bool
    {
    }
    /**
     * Determines if the instance is greater (longer) than another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @see greaterThan()
     *
     * @return bool
     */
    public function gt($interval) : bool
    {
    }
    /**
     * Determines if the instance is greater (longer) than another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @return bool
     */
    public function greaterThan($interval) : bool
    {
    }
    /**
     * Determines if the instance is greater (longer) than or equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @see greaterThanOrEqualTo()
     *
     * @return bool
     */
    public function gte($interval) : bool
    {
    }
    /**
     * Determines if the instance is greater (longer) than or equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @return bool
     */
    public function greaterThanOrEqualTo($interval) : bool
    {
    }
    /**
     * Determines if the instance is less (shorter) than another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @see lessThan()
     *
     * @return bool
     */
    public function lt($interval) : bool
    {
    }
    /**
     * Determines if the instance is less (shorter) than another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @return bool
     */
    public function lessThan($interval) : bool
    {
    }
    /**
     * Determines if the instance is less (shorter) than or equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @see lessThanOrEqualTo()
     *
     * @return bool
     */
    public function lte($interval) : bool
    {
    }
    /**
     * Determines if the instance is less (shorter) than or equal to another
     *
     * @param CarbonInterval|DateInterval|mixed $interval
     *
     * @return bool
     */
    public function lessThanOrEqualTo($interval) : bool
    {
    }
    /**
     * Determines if the instance is between two others.
     *
     * The third argument allow you to specify if bounds are included or not (true by default)
     * but for when you including/excluding bounds may produce different results in your application,
     * we recommend to use the explicit methods ->betweenIncluded() or ->betweenExcluded() instead.
     *
     * @example
     * ```
     * CarbonInterval::hours(48)->between(CarbonInterval::day(), CarbonInterval::days(3)); // true
     * CarbonInterval::hours(48)->between(CarbonInterval::day(), CarbonInterval::hours(36)); // false
     * CarbonInterval::hours(48)->between(CarbonInterval::day(), CarbonInterval::days(2)); // true
     * CarbonInterval::hours(48)->between(CarbonInterval::day(), CarbonInterval::days(2), false); // false
     * ```
     *
     * @param CarbonInterval|DateInterval|mixed $interval1
     * @param CarbonInterval|DateInterval|mixed $interval2
     * @param bool                              $equal     Indicates if an equal to comparison should be done
     *
     * @return bool
     */
    public function between($interval1, $interval2, $equal = true) : bool
    {
    }
    /**
     * Determines if the instance is between two others, bounds excluded.
     *
     * @example
     * ```
     * CarbonInterval::hours(48)->betweenExcluded(CarbonInterval::day(), CarbonInterval::days(3)); // true
     * CarbonInterval::hours(48)->betweenExcluded(CarbonInterval::day(), CarbonInterval::hours(36)); // false
     * CarbonInterval::hours(48)->betweenExcluded(CarbonInterval::day(), CarbonInterval::days(2)); // true
     * ```
     *
     * @param CarbonInterval|DateInterval|mixed $interval1
     * @param CarbonInterval|DateInterval|mixed $interval2
     *
     * @return bool
     */
    public function betweenIncluded($interval1, $interval2) : bool
    {
    }
    /**
     * Determines if the instance is between two others, bounds excluded.
     *
     * @example
     * ```
     * CarbonInterval::hours(48)->betweenExcluded(CarbonInterval::day(), CarbonInterval::days(3)); // true
     * CarbonInterval::hours(48)->betweenExcluded(CarbonInterval::day(), CarbonInterval::hours(36)); // false
     * CarbonInterval::hours(48)->betweenExcluded(CarbonInterval::day(), CarbonInterval::days(2)); // false
     * ```
     *
     * @param CarbonInterval|DateInterval|mixed $interval1
     * @param CarbonInterval|DateInterval|mixed $interval2
     *
     * @return bool
     */
    public function betweenExcluded($interval1, $interval2) : bool
    {
    }
    /**
     * Determines if the instance is between two others
     *
     * @example
     * ```
     * CarbonInterval::hours(48)->isBetween(CarbonInterval::day(), CarbonInterval::days(3)); // true
     * CarbonInterval::hours(48)->isBetween(CarbonInterval::day(), CarbonInterval::hours(36)); // false
     * CarbonInterval::hours(48)->isBetween(CarbonInterval::day(), CarbonInterval::days(2)); // true
     * CarbonInterval::hours(48)->isBetween(CarbonInterval::day(), CarbonInterval::days(2), false); // false
     * ```
     *
     * @param CarbonInterval|DateInterval|mixed $interval1
     * @param CarbonInterval|DateInterval|mixed $interval2
     * @param bool                              $equal     Indicates if an equal to comparison should be done
     *
     * @return bool
     */
    public function isBetween($interval1, $interval2, $equal = true) : bool
    {
    }
    /**
     * Round the current instance at the given unit with given precision if specified and the given function.
     *
     * @param string                             $unit
     * @param float|int|string|DateInterval|null $precision
     * @param string                             $function
     *
     * @throws Exception
     *
     * @return $this
     */
    public function roundUnit($unit, $precision = 1, $function = 'round')
    {
    }
    /**
     * Truncate the current instance at the given unit with given precision if specified.
     *
     * @param string                             $unit
     * @param float|int|string|DateInterval|null $precision
     *
     * @throws Exception
     *
     * @return $this
     */
    public function floorUnit($unit, $precision = 1)
    {
    }
    /**
     * Ceil the current instance at the given unit with given precision if specified.
     *
     * @param string                             $unit
     * @param float|int|string|DateInterval|null $precision
     *
     * @throws Exception
     *
     * @return $this
     */
    public function ceilUnit($unit, $precision = 1)
    {
    }
    /**
     * Round the current instance second with given precision if specified.
     *
     * @param float|int|string|DateInterval|null $precision
     * @param string                             $function
     *
     * @throws Exception
     *
     * @return $this
     */
    public function round($precision = 1, $function = 'round')
    {
    }
    /**
     * Round the current instance second with given precision if specified.
     *
     * @param float|int|string|DateInterval|null $precision
     *
     * @throws Exception
     *
     * @return $this
     */
    public function floor($precision = 1)
    {
    }
    /**
     * Ceil the current instance second with given precision if specified.
     *
     * @param float|int|string|DateInterval|null $precision
     *
     * @throws Exception
     *
     * @return $this
     */
    public function ceil($precision = 1)
    {
    }
    private function needsDeclension(string $mode, int $index, int $parts) : bool
    {
    }
}