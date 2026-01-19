<?php

namespace Sabre\VObject\Splitter;

/**
 * Splitter.
 *
 * This class is responsible for splitting up iCalendar objects.
 *
 * This class expects a single VCALENDAR object with one or more
 * calendar-objects inside. Objects with identical UID's will be combined into
 * a single object.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Dominik Tobschall (http://tobschall.de/)
 * @author Armin Hackmann
 * @license http://sabre.io/license/ Modified BSD License
 */
class ICalendar implements \Sabre\VObject\Splitter\SplitterInterface
{
    /**
     * Timezones.
     *
     * @var array
     */
    protected $vtimezones = [];
    /**
     * iCalendar objects.
     *
     * @var array
     */
    protected $objects = [];
    /**
     * Constructor.
     *
     * The splitter should receive an readable file stream as it's input.
     *
     * @param resource $input
     * @param int $options Parser options, see the OPTIONS constants.
     */
    function __construct($input, $options = 0)
    {
    }
    /**
     * Every time getNext() is called, a new object will be parsed, until we
     * hit the end of the stream.
     *
     * When the end is reached, null will be returned.
     *
     * @return Sabre\VObject\Component|null
     */
    function getNext()
    {
    }
}