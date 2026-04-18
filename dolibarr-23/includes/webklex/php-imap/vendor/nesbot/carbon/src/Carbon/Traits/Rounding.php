<?php

namespace Carbon\Traits;

/**
 * Trait Rounding.
 *
 * Round, ceil, floor units.
 *
 * Depends on the following methods:
 *
 * @method static copy()
 * @method static startOfWeek(int $weekStartsAt = null)
 */
trait Rounding
{
    use \Carbon\Traits\IntervalRounding;
    /**
     * Round the current instance at the given unit with given precision if specified and the given function.
     *
     * @param string    $unit
     * @param float|int $precision
     * @param string    $function
     *
     * @return CarbonInterface
     */
    public function roundUnit($unit, $precision = 1, $function = 'round')
    {
    }
    /**
     * Truncate the current instance at the given unit with given precision if specified.
     *
     * @param string    $unit
     * @param float|int $precision
     *
     * @return CarbonInterface
     */
    public function floorUnit($unit, $precision = 1)
    {
    }
    /**
     * Ceil the current instance at the given unit with given precision if specified.
     *
     * @param string    $unit
     * @param float|int $precision
     *
     * @return CarbonInterface
     */
    public function ceilUnit($unit, $precision = 1)
    {
    }
    /**
     * Round the current instance second with given precision if specified.
     *
     * @param float|int|string|\DateInterval|null $precision
     * @param string                              $function
     *
     * @return CarbonInterface
     */
    public function round($precision = 1, $function = 'round')
    {
    }
    /**
     * Round the current instance second with given precision if specified.
     *
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return CarbonInterface
     */
    public function floor($precision = 1)
    {
    }
    /**
     * Ceil the current instance second with given precision if specified.
     *
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return CarbonInterface
     */
    public function ceil($precision = 1)
    {
    }
    /**
     * Round the current instance week.
     *
     * @param int $weekStartsAt optional start allow you to specify the day of week to use to start the week
     *
     * @return CarbonInterface
     */
    public function roundWeek($weekStartsAt = null)
    {
    }
    /**
     * Truncate the current instance week.
     *
     * @param int $weekStartsAt optional start allow you to specify the day of week to use to start the week
     *
     * @return CarbonInterface
     */
    public function floorWeek($weekStartsAt = null)
    {
    }
    /**
     * Ceil the current instance week.
     *
     * @param int $weekStartsAt optional start allow you to specify the day of week to use to start the week
     *
     * @return CarbonInterface
     */
    public function ceilWeek($weekStartsAt = null)
    {
    }
}