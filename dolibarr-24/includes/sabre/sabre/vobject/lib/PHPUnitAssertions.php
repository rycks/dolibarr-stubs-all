<?php

namespace Sabre\VObject;

/**
 * PHPUnit Assertions.
 *
 * This trait can be added to your unittest to make it easier to test iCalendar
 * and/or vCards.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
trait PHPUnitAssertions
{
    /**
     * This method tests whether two vcards or icalendar objects are
     * semantically identical.
     *
     * It supports objects being supplied as strings, streams or
     * Sabre\VObject\Component instances.
     *
     * PRODID is removed from both objects as this is often changes and would
     * just get in the way.
     *
     * CALSCALE will automatically get removed if it's set to GREGORIAN.
     *
     * Any property that has the value **ANY** will be treated as a wildcard.
     *
     * @param resource|string|Component $expected
     * @param resource|string|Component $actual
     * @param string                    $message
     */
    public function assertVObjectEqualsVObject($expected, $actual, $message = '')
    {
    }
}