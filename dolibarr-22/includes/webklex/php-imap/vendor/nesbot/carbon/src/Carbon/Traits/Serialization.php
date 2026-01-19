<?php

namespace Carbon\Traits;

/**
 * Trait Serialization.
 *
 * Serialization and JSON stuff.
 *
 * Depends on the following properties:
 *
 * @property int $year
 * @property int $month
 * @property int $daysInMonth
 * @property int $quarter
 *
 * Depends on the following methods:
 *
 * @method string|static locale(string $locale = null, string ...$fallbackLocales)
 * @method string        toJSON()
 */
trait Serialization
{
    use \Carbon\Traits\ObjectInitialisation;
    /**
     * The custom Carbon JSON serializer.
     *
     * @var callable|null
     */
    protected static $serializer;
    /**
     * List of key to use for dump/serialization.
     *
     * @var string[]
     */
    protected $dumpProperties = ['date', 'timezone_type', 'timezone'];
    /**
     * Locale to dump comes here before serialization.
     *
     * @var string|null
     */
    protected $dumpLocale;
    /**
     * Embed date properties to dump in a dedicated variables so it won't overlap native
     * DateTime ones.
     *
     * @var array|null
     */
    protected $dumpDateProperties;
    /**
     * Return a serialized string of the instance.
     *
     * @return string
     */
    public function serialize()
    {
    }
    /**
     * Create an instance from a serialized string.
     *
     * @param string $value
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function fromSerialized($value)
    {
    }
    /**
     * The __set_state handler.
     *
     * @param string|array $dump
     *
     * @return static
     */
    #[\ReturnTypeWillChange]
    public static function __set_state($dump)
    {
    }
    /**
     * Returns the list of properties to dump on serialize() called on.
     *
     * @return array
     */
    public function __sleep()
    {
    }
    public function __serialize() : array
    {
    }
    /**
     * Set locale if specified on unserialize() called.
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function __wakeup()
    {
    }
    public function __unserialize(array $data) : void
    {
    }
    /**
     * Prepare the object for JSON serialization.
     *
     * @return array|string
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather transform Carbon object before the serialization.
     *
     * JSON serialize all Carbon instances using the given callback.
     *
     * @param callable $callback
     *
     * @return void
     */
    public static function serializeUsing($callback)
    {
    }
    /**
     * Cleanup properties attached to the public scope of DateTime when a dump of the date is requested.
     * foreach ($date as $_) {}
     * serializer($date)
     * var_export($date)
     * get_object_vars($date)
     */
    public function cleanupDumpProperties()
    {
    }
    private function getSleepProperties() : array
    {
    }
}