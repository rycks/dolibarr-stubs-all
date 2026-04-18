<?php

namespace Carbon\Traits;

/**
 * Trait Units.
 *
 * Add, subtract and set units.
 */
trait Units
{
    /**
     * Add seconds to the instance using timestamp. Positive $value travels
     * forward while negative $value travels into the past.
     *
     * @param string $unit
     * @param int    $value
     *
     * @return static
     */
    public function addRealUnit($unit, $value = 1)
    {
    }
    public function subRealUnit($unit, $value = 1)
    {
    }
    /**
     * Returns true if a property can be changed via setter.
     *
     * @param string $unit
     *
     * @return bool
     */
    public static function isModifiableUnit($unit)
    {
    }
    /**
     * Call native PHP DateTime/DateTimeImmutable add() method.
     *
     * @param DateInterval $interval
     *
     * @return static
     */
    public function rawAdd(\DateInterval $interval)
    {
    }
    /**
     * Add given units or interval to the current instance.
     *
     * @example $date->add('hour', 3)
     * @example $date->add(15, 'days')
     * @example $date->add(CarbonInterval::days(4))
     *
     * @param string|DateInterval|Closure|CarbonConverterInterface $unit
     * @param int                                                  $value
     * @param bool|null                                            $overflow
     *
     * @return static
     */
    #[\ReturnTypeWillChange]
    public function add($unit, $value = 1, $overflow = null)
    {
    }
    /**
     * Add given units to the current instance.
     *
     * @param string    $unit
     * @param int       $value
     * @param bool|null $overflow
     *
     * @return static
     */
    public function addUnit($unit, $value = 1, $overflow = null)
    {
    }
    /**
     * Subtract given units to the current instance.
     *
     * @param string    $unit
     * @param int       $value
     * @param bool|null $overflow
     *
     * @return static
     */
    public function subUnit($unit, $value = 1, $overflow = null)
    {
    }
    /**
     * Call native PHP DateTime/DateTimeImmutable sub() method.
     *
     * @param DateInterval $interval
     *
     * @return static
     */
    public function rawSub(\DateInterval $interval)
    {
    }
    /**
     * Subtract given units or interval to the current instance.
     *
     * @example $date->sub('hour', 3)
     * @example $date->sub(15, 'days')
     * @example $date->sub(CarbonInterval::days(4))
     *
     * @param string|DateInterval|Closure|CarbonConverterInterface $unit
     * @param int                                                  $value
     * @param bool|null                                            $overflow
     *
     * @return static
     */
    #[\ReturnTypeWillChange]
    public function sub($unit, $value = 1, $overflow = null)
    {
    }
    /**
     * Subtract given units or interval to the current instance.
     *
     * @see sub()
     *
     * @param string|DateInterval $unit
     * @param int                 $value
     * @param bool|null           $overflow
     *
     * @return static
     */
    public function subtract($unit, $value = 1, $overflow = null)
    {
    }
}