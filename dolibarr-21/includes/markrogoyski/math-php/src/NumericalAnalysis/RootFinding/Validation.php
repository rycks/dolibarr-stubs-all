<?php

namespace MathPHP\NumericalAnalysis\RootFinding;

/**
 * Common validation methods for root finding techniques
 */
class Validation
{
    /**
     * Throw an exception if the tolerance is negative.
     *
     * @param int|float $tol Tolerance; How close to the actual solution we would like.
     *
     * @throws Exception\OutOfBoundsException if $tol (the tolerance) is negative
     */
    public static function tolerance($tol) : void
    {
    }
    /**
     * Verify that the start and end of of an interval are distinct numbers.
     *
     * @param int|float $a The start of the interval
     * @param int|float $b The end of the interval
     *
     * @throws Exception\BadDataException if $a = $b
     */
    public static function interval($a, $b) : void
    {
    }
}