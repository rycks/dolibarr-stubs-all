<?php

namespace Carbon;

/**
 * Substitution of DatePeriod with some modifications and many more features.
 *
 * @property-read int|float $recurrences number of recurrences (if end not set).
 * @property-read bool $include_start_date rather the start date is included in the iteration.
 * @property-read bool $include_end_date rather the end date is included in the iteration (if recurrences not set).
 * @property-read CarbonInterface $start Period start date.
 * @property-read CarbonInterface $current Current date from the iteration.
 * @property-read CarbonInterface $end Period end date.
 * @property-read CarbonInterval $interval Underlying date interval instance. Always present, one day by default.
 *
 * @method static CarbonPeriod start($date, $inclusive = null) Create instance specifying start date or modify the start date if called on an instance.
 * @method static CarbonPeriod since($date, $inclusive = null) Alias for start().
 * @method static CarbonPeriod sinceNow($inclusive = null) Create instance with start date set to now or set the start date to now if called on an instance.
 * @method static CarbonPeriod end($date = null, $inclusive = null) Create instance specifying end date or modify the end date if called on an instance.
 * @method static CarbonPeriod until($date = null, $inclusive = null) Alias for end().
 * @method static CarbonPeriod untilNow($inclusive = null) Create instance with end date set to now or set the end date to now if called on an instance.
 * @method static CarbonPeriod dates($start, $end = null) Create instance with start and end dates or modify the start and end dates if called on an instance.
 * @method static CarbonPeriod between($start, $end = null) Create instance with start and end dates or modify the start and end dates if called on an instance.
 * @method static CarbonPeriod recurrences($recurrences = null) Create instance with maximum number of recurrences or modify the number of recurrences if called on an instance.
 * @method static CarbonPeriod times($recurrences = null) Alias for recurrences().
 * @method static CarbonPeriod options($options = null) Create instance with options or modify the options if called on an instance.
 * @method static CarbonPeriod toggle($options, $state = null) Create instance with options toggled on or off, or toggle options if called on an instance.
 * @method static CarbonPeriod filter($callback, $name = null) Create instance with filter added to the stack or append a filter if called on an instance.
 * @method static CarbonPeriod push($callback, $name = null) Alias for filter().
 * @method static CarbonPeriod prepend($callback, $name = null) Create instance with filter prepended to the stack or prepend a filter if called on an instance.
 * @method static CarbonPeriod filters(array $filters = []) Create instance with filters stack or replace the whole filters stack if called on an instance.
 * @method static CarbonPeriod interval($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod each($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod every($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod step($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod stepBy($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod invert() Create instance with inverted date interval or invert the interval if called on an instance.
 * @method static CarbonPeriod years($years = 1) Create instance specifying a number of years for date interval or replace the interval by the given a number of years if called on an instance.
 * @method static CarbonPeriod year($years = 1) Alias for years().
 * @method static CarbonPeriod months($months = 1) Create instance specifying a number of months for date interval or replace the interval by the given a number of months if called on an instance.
 * @method static CarbonPeriod month($months = 1) Alias for months().
 * @method static CarbonPeriod weeks($weeks = 1) Create instance specifying a number of weeks for date interval or replace the interval by the given a number of weeks if called on an instance.
 * @method static CarbonPeriod week($weeks = 1) Alias for weeks().
 * @method static CarbonPeriod days($days = 1) Create instance specifying a number of days for date interval or replace the interval by the given a number of days if called on an instance.
 * @method static CarbonPeriod dayz($days = 1) Alias for days().
 * @method static CarbonPeriod day($days = 1) Alias for days().
 * @method static CarbonPeriod hours($hours = 1) Create instance specifying a number of hours for date interval or replace the interval by the given a number of hours if called on an instance.
 * @method static CarbonPeriod hour($hours = 1) Alias for hours().
 * @method static CarbonPeriod minutes($minutes = 1) Create instance specifying a number of minutes for date interval or replace the interval by the given a number of minutes if called on an instance.
 * @method static CarbonPeriod minute($minutes = 1) Alias for minutes().
 * @method static CarbonPeriod seconds($seconds = 1) Create instance specifying a number of seconds for date interval or replace the interval by the given a number of seconds if called on an instance.
 * @method static CarbonPeriod second($seconds = 1) Alias for seconds().
 * @method $this roundYear(float $precision = 1, string $function = "round") Round the current instance year with given precision using the given function.
 * @method $this roundYears(float $precision = 1, string $function = "round") Round the current instance year with given precision using the given function.
 * @method $this floorYear(float $precision = 1) Truncate the current instance year with given precision.
 * @method $this floorYears(float $precision = 1) Truncate the current instance year with given precision.
 * @method $this ceilYear(float $precision = 1) Ceil the current instance year with given precision.
 * @method $this ceilYears(float $precision = 1) Ceil the current instance year with given precision.
 * @method $this roundMonth(float $precision = 1, string $function = "round") Round the current instance month with given precision using the given function.
 * @method $this roundMonths(float $precision = 1, string $function = "round") Round the current instance month with given precision using the given function.
 * @method $this floorMonth(float $precision = 1) Truncate the current instance month with given precision.
 * @method $this floorMonths(float $precision = 1) Truncate the current instance month with given precision.
 * @method $this ceilMonth(float $precision = 1) Ceil the current instance month with given precision.
 * @method $this ceilMonths(float $precision = 1) Ceil the current instance month with given precision.
 * @method $this roundWeek(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this roundWeeks(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this floorWeek(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this floorWeeks(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this ceilWeek(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this ceilWeeks(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this roundDay(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this roundDays(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this floorDay(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this floorDays(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this ceilDay(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this ceilDays(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this roundHour(float $precision = 1, string $function = "round") Round the current instance hour with given precision using the given function.
 * @method $this roundHours(float $precision = 1, string $function = "round") Round the current instance hour with given precision using the given function.
 * @method $this floorHour(float $precision = 1) Truncate the current instance hour with given precision.
 * @method $this floorHours(float $precision = 1) Truncate the current instance hour with given precision.
 * @method $this ceilHour(float $precision = 1) Ceil the current instance hour with given precision.
 * @method $this ceilHours(float $precision = 1) Ceil the current instance hour with given precision.
 * @method $this roundMinute(float $precision = 1, string $function = "round") Round the current instance minute with given precision using the given function.
 * @method $this roundMinutes(float $precision = 1, string $function = "round") Round the current instance minute with given precision using the given function.
 * @method $this floorMinute(float $precision = 1) Truncate the current instance minute with given precision.
 * @method $this floorMinutes(float $precision = 1) Truncate the current instance minute with given precision.
 * @method $this ceilMinute(float $precision = 1) Ceil the current instance minute with given precision.
 * @method $this ceilMinutes(float $precision = 1) Ceil the current instance minute with given precision.
 * @method $this roundSecond(float $precision = 1, string $function = "round") Round the current instance second with given precision using the given function.
 * @method $this roundSeconds(float $precision = 1, string $function = "round") Round the current instance second with given precision using the given function.
 * @method $this floorSecond(float $precision = 1) Truncate the current instance second with given precision.
 * @method $this floorSeconds(float $precision = 1) Truncate the current instance second with given precision.
 * @method $this ceilSecond(float $precision = 1) Ceil the current instance second with given precision.
 * @method $this ceilSeconds(float $precision = 1) Ceil the current instance second with given precision.
 * @method $this roundMillennium(float $precision = 1, string $function = "round") Round the current instance millennium with given precision using the given function.
 * @method $this roundMillennia(float $precision = 1, string $function = "round") Round the current instance millennium with given precision using the given function.
 * @method $this floorMillennium(float $precision = 1) Truncate the current instance millennium with given precision.
 * @method $this floorMillennia(float $precision = 1) Truncate the current instance millennium with given precision.
 * @method $this ceilMillennium(float $precision = 1) Ceil the current instance millennium with given precision.
 * @method $this ceilMillennia(float $precision = 1) Ceil the current instance millennium with given precision.
 * @method $this roundCentury(float $precision = 1, string $function = "round") Round the current instance century with given precision using the given function.
 * @method $this roundCenturies(float $precision = 1, string $function = "round") Round the current instance century with given precision using the given function.
 * @method $this floorCentury(float $precision = 1) Truncate the current instance century with given precision.
 * @method $this floorCenturies(float $precision = 1) Truncate the current instance century with given precision.
 * @method $this ceilCentury(float $precision = 1) Ceil the current instance century with given precision.
 * @method $this ceilCenturies(float $precision = 1) Ceil the current instance century with given precision.
 * @method $this roundDecade(float $precision = 1, string $function = "round") Round the current instance decade with given precision using the given function.
 * @method $this roundDecades(float $precision = 1, string $function = "round") Round the current instance decade with given precision using the given function.
 * @method $this floorDecade(float $precision = 1) Truncate the current instance decade with given precision.
 * @method $this floorDecades(float $precision = 1) Truncate the current instance decade with given precision.
 * @method $this ceilDecade(float $precision = 1) Ceil the current instance decade with given precision.
 * @method $this ceilDecades(float $precision = 1) Ceil the current instance decade with given precision.
 * @method $this roundQuarter(float $precision = 1, string $function = "round") Round the current instance quarter with given precision using the given function.
 * @method $this roundQuarters(float $precision = 1, string $function = "round") Round the current instance quarter with given precision using the given function.
 * @method $this floorQuarter(float $precision = 1) Truncate the current instance quarter with given precision.
 * @method $this floorQuarters(float $precision = 1) Truncate the current instance quarter with given precision.
 * @method $this ceilQuarter(float $precision = 1) Ceil the current instance quarter with given precision.
 * @method $this ceilQuarters(float $precision = 1) Ceil the current instance quarter with given precision.
 * @method $this roundMillisecond(float $precision = 1, string $function = "round") Round the current instance millisecond with given precision using the given function.
 * @method $this roundMilliseconds(float $precision = 1, string $function = "round") Round the current instance millisecond with given precision using the given function.
 * @method $this floorMillisecond(float $precision = 1) Truncate the current instance millisecond with given precision.
 * @method $this floorMilliseconds(float $precision = 1) Truncate the current instance millisecond with given precision.
 * @method $this ceilMillisecond(float $precision = 1) Ceil the current instance millisecond with given precision.
 * @method $this ceilMilliseconds(float $precision = 1) Ceil the current instance millisecond with given precision.
 * @method $this roundMicrosecond(float $precision = 1, string $function = "round") Round the current instance microsecond with given precision using the given function.
 * @method $this roundMicroseconds(float $precision = 1, string $function = "round") Round the current instance microsecond with given precision using the given function.
 * @method $this floorMicrosecond(float $precision = 1) Truncate the current instance microsecond with given precision.
 * @method $this floorMicroseconds(float $precision = 1) Truncate the current instance microsecond with given precision.
 * @method $this ceilMicrosecond(float $precision = 1) Ceil the current instance microsecond with given precision.
 * @method $this ceilMicroseconds(float $precision = 1) Ceil the current instance microsecond with given precision.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CarbonPeriod implements \Iterator, \Countable, \JsonSerializable
{
    use \Carbon\Traits\IntervalRounding;
    use \Carbon\Traits\Mixin {
        \Carbon\Traits\Mixin::mixin as baseMixin;
    }
    use \Carbon\Traits\Options;
    /**
     * Built-in filter for limit by recurrences.
     *
     * @var callable
     */
    public const RECURRENCES_FILTER = [self::class, 'filterRecurrences'];
    /**
     * Built-in filter for limit to an end.
     *
     * @var callable
     */
    public const END_DATE_FILTER = [self::class, 'filterEndDate'];
    /**
     * Special value which can be returned by filters to end iteration. Also a filter.
     *
     * @var callable
     */
    public const END_ITERATION = [self::class, 'endIteration'];
    /**
     * Exclude start date from iteration.
     *
     * @var int
     */
    public const EXCLUDE_START_DATE = 1;
    /**
     * Exclude end date from iteration.
     *
     * @var int
     */
    public const EXCLUDE_END_DATE = 2;
    /**
     * Yield CarbonImmutable instances.
     *
     * @var int
     */
    public const IMMUTABLE = 4;
    /**
     * Number of maximum attempts before giving up on finding next valid date.
     *
     * @var int
     */
    public const NEXT_MAX_ATTEMPTS = 1000;
    /**
     * Number of maximum attempts before giving up on finding end date.
     *
     * @var int
     */
    public const END_MAX_ATTEMPTS = 10000;
    /**
     * The registered macros.
     *
     * @var array
     */
    protected static $macros = [];
    /**
     * Date class of iteration items.
     *
     * @var string
     */
    protected $dateClass = \Carbon\Carbon::class;
    /**
     * Underlying date interval instance. Always present, one day by default.
     *
     * @var CarbonInterval
     */
    protected $dateInterval;
    /**
     * Whether current date interval was set by default.
     *
     * @var bool
     */
    protected $isDefaultInterval;
    /**
     * The filters stack.
     *
     * @var array
     */
    protected $filters = [];
    /**
     * Period start date. Applied on rewind. Always present, now by default.
     *
     * @var CarbonInterface
     */
    protected $startDate;
    /**
     * Period end date. For inverted interval should be before the start date. Applied via a filter.
     *
     * @var CarbonInterface|null
     */
    protected $endDate;
    /**
     * Limit for number of recurrences. Applied via a filter.
     *
     * @var int|null
     */
    protected $recurrences;
    /**
     * Iteration options.
     *
     * @var int
     */
    protected $options;
    /**
     * Index of current date. Always sequential, even if some dates are skipped by filters.
     * Equal to null only before the first iteration.
     *
     * @var int
     */
    protected $key;
    /**
     * Current date. May temporarily hold unaccepted value when looking for a next valid date.
     * Equal to null only before the first iteration.
     *
     * @var CarbonInterface
     */
    protected $current;
    /**
     * Timezone of current date. Taken from the start date.
     *
     * @var \DateTimeZone|null
     */
    protected $timezone;
    /**
     * The cached validation result for current date.
     *
     * @var bool|string|null
     */
    protected $validationResult;
    /**
     * Timezone handler for settings() method.
     *
     * @var mixed
     */
    protected $tzName;
    /**
     * Make a CarbonPeriod instance from given variable if possible.
     *
     * @param mixed $var
     *
     * @return static|null
     */
    public static function make($var)
    {
    }
    /**
     * Create a new instance from a DatePeriod or CarbonPeriod object.
     *
     * @param CarbonPeriod|DatePeriod $period
     *
     * @return static
     */
    public static function instance($period)
    {
    }
    /**
     * Create a new instance.
     *
     * @return static
     */
    public static function create(...$params)
    {
    }
    /**
     * Create a new instance from an array of parameters.
     *
     * @param array $params
     *
     * @return static
     */
    public static function createFromArray(array $params)
    {
    }
    /**
     * Create CarbonPeriod from ISO 8601 string.
     *
     * @param string   $iso
     * @param int|null $options
     *
     * @return static
     */
    public static function createFromIso($iso, $options = null)
    {
    }
    /**
     * Return whether given interval contains non zero value of any time unit.
     *
     * @param \DateInterval $interval
     *
     * @return bool
     */
    protected static function intervalHasTime(\DateInterval $interval)
    {
    }
    /**
     * Return whether given variable is an ISO 8601 specification.
     *
     * Note: Check is very basic, as actual validation will be done later when parsing.
     * We just want to ensure that variable is not any other type of a valid parameter.
     *
     * @param mixed $var
     *
     * @return bool
     */
    protected static function isIso8601($var)
    {
    }
    /**
     * Parse given ISO 8601 string into an array of arguments.
     *
     * @SuppressWarnings(PHPMD.ElseExpression)
     *
     * @param string $iso
     *
     * @return array
     */
    protected static function parseIso8601($iso)
    {
    }
    /**
     * Add missing parts of the target date from the soure date.
     *
     * @param string $source
     * @param string $target
     *
     * @return string
     */
    protected static function addMissingParts($source, $target)
    {
    }
    /**
     * Register a custom macro.
     *
     * @example
     * ```
     * CarbonPeriod::macro('middle', function () {
     *   return $this->getStartDate()->average($this->getEndDate());
     * });
     * echo CarbonPeriod::since('2011-05-12')->until('2011-06-03')->middle();
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
     * CarbonPeriod::mixin(new class {
     *   public function addDays() {
     *     return function ($count = 1) {
     *       return $this->setStartDate(
     *         $this->getStartDate()->addDays($count)
     *       )->setEndDate(
     *         $this->getEndDate()->addDays($count)
     *       );
     *     };
     *   }
     *   public function subDays() {
     *     return function ($count = 1) {
     *       return $this->setStartDate(
     *         $this->getStartDate()->subDays($count)
     *       )->setEndDate(
     *         $this->getEndDate()->subDays($count)
     *       );
     *     };
     *   }
     * });
     * echo CarbonPeriod::create('2000-01-01', '2000-02-01')->addDays(5)->subDays(3);
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
     * Provide static proxy for instance aliases.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
    }
    /**
     * CarbonPeriod constructor.
     *
     * @SuppressWarnings(PHPMD.ElseExpression)
     *
     * @throws InvalidArgumentException
     */
    public function __construct(...$arguments)
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
     * Get the getter for a property allowing both `DatePeriod` snakeCase and camelCase names.
     *
     * @param string $name
     *
     * @return callable|null
     */
    protected function getGetter(string $name)
    {
    }
    /**
     * Get a property allowing both `DatePeriod` snakeCase and camelCase names.
     *
     * @param string $name
     *
     * @return bool|CarbonInterface|CarbonInterval|int|null
     */
    public function get(string $name)
    {
    }
    /**
     * Get a property allowing both `DatePeriod` snakeCase and camelCase names.
     *
     * @param string $name
     *
     * @return bool|CarbonInterface|CarbonInterval|int|null
     */
    public function __get(string $name)
    {
    }
    /**
     * Check if an attribute exists on the object
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name) : bool
    {
    }
    /**
     * @alias copy
     *
     * Get a copy of the instance.
     *
     * @return static
     */
    public function clone()
    {
    }
    /**
     * Set the iteration item class.
     *
     * @param string $dateClass
     *
     * @return $this
     */
    public function setDateClass(string $dateClass)
    {
    }
    /**
     * Returns iteration item date class.
     *
     * @return string
     */
    public function getDateClass() : string
    {
    }
    /**
     * Change the period date interval.
     *
     * @param DateInterval|string $interval
     *
     * @throws InvalidIntervalException
     *
     * @return $this
     */
    public function setDateInterval($interval)
    {
    }
    /**
     * Invert the period date interval.
     *
     * @return $this
     */
    public function invertDateInterval()
    {
    }
    /**
     * Set start and end date.
     *
     * @param DateTime|DateTimeInterface|string      $start
     * @param DateTime|DateTimeInterface|string|null $end
     *
     * @return $this
     */
    public function setDates($start, $end)
    {
    }
    /**
     * Change the period options.
     *
     * @param int|null $options
     *
     * @throws InvalidArgumentException
     *
     * @return $this
     */
    public function setOptions($options)
    {
    }
    /**
     * Get the period options.
     *
     * @return int
     */
    public function getOptions()
    {
    }
    /**
     * Toggle given options on or off.
     *
     * @param int       $options
     * @param bool|null $state
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function toggleOptions($options, $state = null)
    {
    }
    /**
     * Toggle EXCLUDE_START_DATE option.
     *
     * @param bool $state
     *
     * @return $this
     */
    public function excludeStartDate($state = true)
    {
    }
    /**
     * Toggle EXCLUDE_END_DATE option.
     *
     * @param bool $state
     *
     * @return $this
     */
    public function excludeEndDate($state = true)
    {
    }
    /**
     * Get the underlying date interval.
     *
     * @return CarbonInterval
     */
    public function getDateInterval()
    {
    }
    /**
     * Get start date of the period.
     *
     * @param string|null $rounding Optional rounding 'floor', 'ceil', 'round' using the period interval.
     *
     * @return CarbonInterface
     */
    public function getStartDate(string $rounding = null)
    {
    }
    /**
     * Get end date of the period.
     *
     * @param string|null $rounding Optional rounding 'floor', 'ceil', 'round' using the period interval.
     *
     * @return CarbonInterface|null
     */
    public function getEndDate(string $rounding = null)
    {
    }
    /**
     * Get number of recurrences.
     *
     * @return int|float|null
     */
    public function getRecurrences()
    {
    }
    /**
     * Returns true if the start date should be excluded.
     *
     * @return bool
     */
    public function isStartExcluded()
    {
    }
    /**
     * Returns true if the end date should be excluded.
     *
     * @return bool
     */
    public function isEndExcluded()
    {
    }
    /**
     * Returns true if the start date should be included.
     *
     * @return bool
     */
    public function isStartIncluded()
    {
    }
    /**
     * Returns true if the end date should be included.
     *
     * @return bool
     */
    public function isEndIncluded()
    {
    }
    /**
     * Return the start if it's included by option, else return the start + 1 period interval.
     *
     * @return CarbonInterface
     */
    public function getIncludedStartDate()
    {
    }
    /**
     * Return the end if it's included by option, else return the end - 1 period interval.
     * Warning: if the period has no fixed end, this method will iterate the period to calculate it.
     *
     * @return CarbonInterface
     */
    public function getIncludedEndDate()
    {
    }
    /**
     * Add a filter to the stack.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param callable $callback
     * @param string   $name
     *
     * @return $this
     */
    public function addFilter($callback, $name = null)
    {
    }
    /**
     * Prepend a filter to the stack.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param callable $callback
     * @param string   $name
     *
     * @return $this
     */
    public function prependFilter($callback, $name = null)
    {
    }
    /**
     * Remove a filter by instance or name.
     *
     * @param callable|string $filter
     *
     * @return $this
     */
    public function removeFilter($filter)
    {
    }
    /**
     * Return whether given instance or name is in the filter stack.
     *
     * @param callable|string $filter
     *
     * @return bool
     */
    public function hasFilter($filter)
    {
    }
    /**
     * Get filters stack.
     *
     * @return array
     */
    public function getFilters()
    {
    }
    /**
     * Set filters stack.
     *
     * @param array $filters
     *
     * @return $this
     */
    public function setFilters(array $filters)
    {
    }
    /**
     * Reset filters stack.
     *
     * @return $this
     */
    public function resetFilters()
    {
    }
    /**
     * Add a recurrences filter (set maximum number of recurrences).
     *
     * @param int|float|null $recurrences
     *
     * @throws InvalidArgumentException
     *
     * @return $this
     */
    public function setRecurrences($recurrences)
    {
    }
    /**
     * Change the period start date.
     *
     * @param DateTime|DateTimeInterface|string $date
     * @param bool|null                         $inclusive
     *
     * @throws InvalidPeriodDateException
     *
     * @return $this
     */
    public function setStartDate($date, $inclusive = null)
    {
    }
    /**
     * Change the period end date.
     *
     * @param DateTime|DateTimeInterface|string|null $date
     * @param bool|null                              $inclusive
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setEndDate($date, $inclusive = null)
    {
    }
    /**
     * Check if the current position is valid.
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
    }
    /**
     * Return the current key.
     *
     * @return int|null
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
    }
    /**
     * Return the current date.
     *
     * @return CarbonInterface|null
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
    }
    /**
     * Move forward to the next date.
     *
     * @throws RuntimeException
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
    }
    /**
     * Rewind to the start date.
     *
     * Iterating over a date in the UTC timezone avoids bug during backward DST change.
     *
     * @see https://bugs.php.net/bug.php?id=72255
     * @see https://bugs.php.net/bug.php?id=74274
     * @see https://wiki.php.net/rfc/datetime_and_daylight_saving_time
     *
     * @throws RuntimeException
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
    }
    /**
     * Skip iterations and returns iteration state (false if ended, true if still valid).
     *
     * @param int $count steps number to skip (1 by default)
     *
     * @return bool
     */
    public function skip($count = 1)
    {
    }
    /**
     * Format the date period as ISO 8601.
     *
     * @return string
     */
    public function toIso8601String()
    {
    }
    /**
     * Convert the date period into a string.
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Format the date period as ISO 8601.
     *
     * @return string
     */
    public function spec()
    {
    }
    /**
     * Cast the current instance into the given class.
     *
     * @param string $className The $className::instance() method will be called to cast the current object.
     *
     * @return DatePeriod
     */
    public function cast(string $className)
    {
    }
    /**
     * Return native DatePeriod PHP object matching the current instance.
     *
     * @example
     * ```
     * var_dump(CarbonPeriod::create('2021-01-05', '2021-02-15')->toDatePeriod());
     * ```
     *
     * @return DatePeriod
     */
    public function toDatePeriod()
    {
    }
    /**
     * Return `true` if the period has no custom filter and is guaranteed to be endless.
     *
     * Note that we can't check if a period is endless as soon as it has custom filters
     * because filters can emit `CarbonPeriod::END_ITERATION` to stop the iteration in
     * a way we can't predict without actually iterating the period.
     */
    public function isUnfilteredAndEndLess() : bool
    {
    }
    /**
     * Convert the date period into an array without changing current iteration state.
     *
     * @return CarbonInterface[]
     */
    public function toArray()
    {
    }
    /**
     * Count dates in the date period.
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
    }
    /**
     * Return the first date in the date period.
     *
     * @return CarbonInterface|null
     */
    public function first()
    {
    }
    /**
     * Return the last date in the date period.
     *
     * @return CarbonInterface|null
     */
    public function last()
    {
    }
    /**
     * Convert the date period into a string.
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Add aliases for setters.
     *
     * CarbonPeriod::days(3)->hours(5)->invert()
     *     ->sinceNow()->until('2010-01-10')
     *     ->filter(...)
     *     ->count()
     *
     * Note: We use magic method to let static and instance aliases with the same names.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
    }
    /**
     * Set the instance's timezone from a string or object and apply it to start/end.
     *
     * @param \DateTimeZone|string $timezone
     *
     * @return static
     */
    public function setTimezone($timezone)
    {
    }
    /**
     * Set the instance's timezone from a string or object and add/subtract the offset difference to start/end.
     *
     * @param \DateTimeZone|string $timezone
     *
     * @return static
     */
    public function shiftTimezone($timezone)
    {
    }
    /**
     * Returns the end is set, else calculated from start an recurrences.
     *
     * @param string|null $rounding Optional rounding 'floor', 'ceil', 'round' using the period interval.
     *
     * @return CarbonInterface
     */
    public function calculateEnd(string $rounding = null)
    {
    }
    /**
     * @return CarbonInterface|null
     */
    private function getEndFromRecurrences()
    {
    }
    /**
     * @return CarbonInterface|null
     */
    private function iterateUntilEnd()
    {
    }
    /**
     * Returns true if the current period overlaps the given one (if 1 parameter passed)
     * or the period between 2 dates (if 2 parameters passed).
     *
     * @param CarbonPeriod|\DateTimeInterface|Carbon|CarbonImmutable|string $rangeOrRangeStart
     * @param \DateTimeInterface|Carbon|CarbonImmutable|string|null         $rangeEnd
     *
     * @return bool
     */
    public function overlaps($rangeOrRangeStart, $rangeEnd = null)
    {
    }
    /**
     * Execute a given function on each date of the period.
     *
     * @example
     * ```
     * Carbon::create('2020-11-29')->daysUntil('2020-12-24')->forEach(function (Carbon $date) {
     *   echo $date->diffInDays('2020-12-25')." days before Christmas!\n";
     * });
     * ```
     *
     * @param callable $callback
     */
    public function forEach(callable $callback)
    {
    }
    /**
     * Execute a given function on each date of the period and yield the result of this function.
     *
     * @example
     * ```
     * $period = Carbon::create('2020-11-29')->daysUntil('2020-12-24');
     * echo implode("\n", iterator_to_array($period->map(function (Carbon $date) {
     *   return $date->diffInDays('2020-12-25').' days before Christmas!';
     * })));
     * ```
     *
     * @param callable $callback
     *
     * @return \Generator
     */
    public function map(callable $callback)
    {
    }
    /**
     * Determines if the instance is equal to another.
     * Warning: if options differ, instances wil never be equal.
     *
     * @param mixed $period
     *
     * @see equalTo()
     *
     * @return bool
     */
    public function eq($period) : bool
    {
    }
    /**
     * Determines if the instance is equal to another.
     * Warning: if options differ, instances wil never be equal.
     *
     * @param mixed $period
     *
     * @return bool
     */
    public function equalTo($period) : bool
    {
    }
    /**
     * Determines if the instance is not equal to another.
     * Warning: if options differ, instances wil never be equal.
     *
     * @param mixed $period
     *
     * @see notEqualTo()
     *
     * @return bool
     */
    public function ne($period) : bool
    {
    }
    /**
     * Determines if the instance is not equal to another.
     * Warning: if options differ, instances wil never be equal.
     *
     * @param mixed $period
     *
     * @return bool
     */
    public function notEqualTo($period) : bool
    {
    }
    /**
     * Determines if the start date is before an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsBefore($date = null) : bool
    {
    }
    /**
     * Determines if the start date is before or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsBeforeOrAt($date = null) : bool
    {
    }
    /**
     * Determines if the start date is after an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsAfter($date = null) : bool
    {
    }
    /**
     * Determines if the start date is after or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsAfterOrAt($date = null) : bool
    {
    }
    /**
     * Determines if the start date is the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsAt($date = null) : bool
    {
    }
    /**
     * Determines if the end date is before an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsBefore($date = null) : bool
    {
    }
    /**
     * Determines if the end date is before or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsBeforeOrAt($date = null) : bool
    {
    }
    /**
     * Determines if the end date is after an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsAfter($date = null) : bool
    {
    }
    /**
     * Determines if the end date is after or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsAfterOrAt($date = null) : bool
    {
    }
    /**
     * Determines if the end date is the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsAt($date = null) : bool
    {
    }
    /**
     * Return true if start date is now or later.
     * (Rather start/end are included by options is ignored.)
     *
     * @return bool
     */
    public function isStarted() : bool
    {
    }
    /**
     * Return true if end date is now or later.
     * (Rather start/end are included by options is ignored.)
     *
     * @return bool
     */
    public function isEnded() : bool
    {
    }
    /**
     * Return true if now is between start date (included) and end date (excluded).
     * (Rather start/end are included by options is ignored.)
     *
     * @return bool
     */
    public function isInProgress() : bool
    {
    }
    /**
     * Round the current instance at the given unit with given precision if specified and the given function.
     *
     * @param string                              $unit
     * @param float|int|string|\DateInterval|null $precision
     * @param string                              $function
     *
     * @return $this
     */
    public function roundUnit($unit, $precision = 1, $function = 'round')
    {
    }
    /**
     * Truncate the current instance at the given unit with given precision if specified.
     *
     * @param string                              $unit
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return $this
     */
    public function floorUnit($unit, $precision = 1)
    {
    }
    /**
     * Ceil the current instance at the given unit with given precision if specified.
     *
     * @param string                              $unit
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return $this
     */
    public function ceilUnit($unit, $precision = 1)
    {
    }
    /**
     * Round the current instance second with given precision if specified (else period interval is used).
     *
     * @param float|int|string|\DateInterval|null $precision
     * @param string                              $function
     *
     * @return $this
     */
    public function round($precision = null, $function = 'round')
    {
    }
    /**
     * Round the current instance second with given precision if specified (else period interval is used).
     *
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return $this
     */
    public function floor($precision = null)
    {
    }
    /**
     * Ceil the current instance second with given precision if specified (else period interval is used).
     *
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return $this
     */
    public function ceil($precision = null)
    {
    }
    /**
     * Specify data which should be serialized to JSON.
     *
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return CarbonInterface[]
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * Return true if the given date is between start and end.
     *
     * @param \Carbon\Carbon|\Carbon\CarbonPeriod|\Carbon\CarbonInterval|\DateInterval|\DatePeriod|\DateTimeInterface|string|null $date
     *
     * @return bool
     */
    public function contains($date = null) : bool
    {
    }
    /**
     * Return true if the current period follows a given other period (with no overlap).
     * For instance, [2019-08-01 -> 2019-08-12] follows [2019-07-29 -> 2019-07-31]
     * Note than in this example, follows() would be false if 2019-08-01 or 2019-07-31 was excluded by options.
     *
     * @param \Carbon\CarbonPeriod|\DatePeriod|string $period
     *
     * @return bool
     */
    public function follows($period, ...$arguments) : bool
    {
    }
    /**
     * Return true if the given other period follows the current one (with no overlap).
     * For instance, [2019-07-29 -> 2019-07-31] is followed by [2019-08-01 -> 2019-08-12]
     * Note than in this example, isFollowedBy() would be false if 2019-08-01 or 2019-07-31 was excluded by options.
     *
     * @param \Carbon\CarbonPeriod|\DatePeriod|string $period
     *
     * @return bool
     */
    public function isFollowedBy($period, ...$arguments) : bool
    {
    }
    /**
     * Return true if the given period either follows or is followed by the current one.
     *
     * @see follows()
     * @see isFollowedBy()
     *
     * @param \Carbon\CarbonPeriod|\DatePeriod|string $period
     *
     * @return bool
     */
    public function isConsecutiveWith($period, ...$arguments) : bool
    {
    }
    /**
     * Update properties after removing built-in filters.
     *
     * @return void
     */
    protected function updateInternalState()
    {
    }
    /**
     * Create a filter tuple from raw parameters.
     *
     * Will create an automatic filter callback for one of Carbon's is* methods.
     *
     * @param array $parameters
     *
     * @return array
     */
    protected function createFilterTuple(array $parameters)
    {
    }
    /**
     * Return whether given callable is a string pointing to one of Carbon's is* methods
     * and should be automatically converted to a filter callback.
     *
     * @param callable $callable
     *
     * @return bool
     */
    protected function isCarbonPredicateMethod($callable)
    {
    }
    /**
     * Recurrences filter callback (limits number of recurrences).
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param \Carbon\Carbon $current
     * @param int            $key
     *
     * @return bool|string
     */
    protected function filterRecurrences($current, $key)
    {
    }
    /**
     * End date filter callback.
     *
     * @param \Carbon\Carbon $current
     *
     * @return bool|string
     */
    protected function filterEndDate($current)
    {
    }
    /**
     * End iteration filter callback.
     *
     * @return string
     */
    protected function endIteration()
    {
    }
    /**
     * Handle change of the parameters.
     */
    protected function handleChangedParameters()
    {
    }
    /**
     * Validate current date and stop iteration when necessary.
     *
     * Returns true when current date is valid, false if it is not, or static::END_ITERATION
     * when iteration should be stopped.
     *
     * @return bool|string
     */
    protected function validateCurrentDate()
    {
    }
    /**
     * Check whether current value and key pass all the filters.
     *
     * @return bool|string
     */
    protected function checkFilters()
    {
    }
    /**
     * Prepare given date to be returned to the external logic.
     *
     * @param CarbonInterface $date
     *
     * @return CarbonInterface
     */
    protected function prepareForReturn(\Carbon\CarbonInterface $date)
    {
    }
    /**
     * Keep incrementing the current date until a valid date is found or the iteration is ended.
     *
     * @throws RuntimeException
     *
     * @return void
     */
    protected function incrementCurrentDateUntilValid()
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
     * Return the Carbon instance passed through, a now instance in the same timezone
     * if null given or parse the input if string given.
     *
     * @param \Carbon\Carbon|\Carbon\CarbonPeriod|\Carbon\CarbonInterval|\DateInterval|\DatePeriod|\DateTimeInterface|string|null $date
     *
     * @return \Carbon\CarbonInterface
     */
    protected function resolveCarbon($date = null)
    {
    }
    /**
     * Resolve passed arguments or DatePeriod to a CarbonPeriod object.
     *
     * @param mixed $period
     * @param mixed ...$arguments
     *
     * @return static
     */
    protected function resolveCarbonPeriod($period, ...$arguments)
    {
    }
    private function orderCouple($first, $second) : array
    {
    }
    private function makeDateTime($value) : ?\DateTimeInterface
    {
    }
    private function isInfiniteDate($date) : bool
    {
    }
    private function rawDate($date) : ?\DateTimeInterface
    {
    }
}