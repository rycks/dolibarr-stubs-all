<?php

namespace Sabre\VObject\Recur\EventIterator;

class InfiniteLoopProblemTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
    }
    /**
     * This bug came from a Fruux customer. This would result in a never-ending
     * request.
     */
    function testFastForwardTooFar()
    {
    }
    /**
     * Different bug, also likely an infinite loop.
     */
    function testYearlyByMonthLoop()
    {
    }
    /**
     * Something, somewhere produced an ics with an interval set to 0. Because
     * this means we increase the current day (or week, month) by 0, this also
     * results in an infinite loop.
     *
     * @expectedException \Sabre\VObject\InvalidDataException
     * @return void
     */
    function testZeroInterval()
    {
    }
}