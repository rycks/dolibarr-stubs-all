<?php

namespace Sabre\VObject;

/**
 * This class generates birthday calendars.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Dominik Tobschall (http://tobschall.de/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class BirthdayCalendarGenerator
{
    /**
     * Input objects.
     *
     * @var array
     */
    protected $objects = [];
    /**
     * Default year.
     * Used for dates without a year.
     */
    const DEFAULT_YEAR = 2000;
    /**
     * Output format for the SUMMARY.
     *
     * @var string
     */
    protected $format = '%1$s\'s Birthday';
    /**
     * Creates the generator.
     *
     * Check the setTimeRange and setObjects methods for details about the
     * arguments.
     *
     * @param mixed $objects
     */
    function __construct($objects = null)
    {
    }
    /**
     * Sets the input objects.
     *
     * You must either supply a vCard as a string or as a Component/VCard object.
     * It's also possible to supply an array of strings or objects.
     *
     * @param mixed $objects
     *
     * @return void
     */
    function setObjects($objects)
    {
    }
    /**
     * Sets the output format for the SUMMARY
     *
     * @param string $format
     *
     * @return void
     */
    function setFormat($format)
    {
    }
    /**
     * Parses the input data and returns a VCALENDAR.
     *
     * @return Component/VCalendar
     */
    function getResult()
    {
    }
}