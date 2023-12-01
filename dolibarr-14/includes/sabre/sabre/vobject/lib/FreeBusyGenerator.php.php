<?php

namespace Sabre\VObject;

/**
 * This class helps with generating FREEBUSY reports based on existing sets of
 * objects.
 *
 * It only looks at VEVENT and VFREEBUSY objects from the sourcedata, and
 * generates a single VFREEBUSY object.
 *
 * VFREEBUSY components are described in RFC5545, The rules for what should
 * go in a single freebusy report is taken from RFC4791, section 7.10.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class FreeBusyGenerator
{
    /**
     * Input objects.
     *
     * @var array
     */
    protected $objects = [];
    /**
     * Start of range.
     *
     * @var DateTimeInterface|null
     */
    protected $start;
    /**
     * End of range.
     *
     * @var DateTimeInterface|null
     */
    protected $end;
    /**
     * VCALENDAR object.
     *
     * @var Document
     */
    protected $baseObject;
    /**
     * Reference timezone.
     *
     * When we are calculating busy times, and we come across so-called
     * floating times (times without a timezone), we use the reference timezone
     * instead.
     *
     * This is also used for all-day events.
     *
     * This defaults to UTC.
     *
     * @var DateTimeZone
     */
    protected $timeZone;
    /**
     * A VAVAILABILITY document.
     *
     * If this is set, it's information will be included when calculating
     * freebusy time.
     *
     * @var Document
     */
    protected $vavailability;
    /**
     * Creates the generator.
     *
     * Check the setTimeRange and setObjects methods for details about the
     * arguments.
     *
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     * @param mixed $objects
     * @param DateTimeZone $timeZone
     */
    function __construct(\DateTimeInterface $start = null, \DateTimeInterface $end = null, $objects = null, \DateTimeZone $timeZone = null)
    {
    }
    /**
     * Sets the VCALENDAR object.
     *
     * If this is set, it will not be generated for you. You are responsible
     * for setting things like the METHOD, CALSCALE, VERSION, etc..
     *
     * The VFREEBUSY object will be automatically added though.
     *
     * @param Document $vcalendar
     * @return void
     */
    function setBaseObject(\Sabre\VObject\Document $vcalendar)
    {
    }
    /**
     * Sets a VAVAILABILITY document.
     *
     * @param Document $vcalendar
     * @return void
     */
    function setVAvailability(\Sabre\VObject\Document $vcalendar)
    {
    }
    /**
     * Sets the input objects.
     *
     * You must either specify a valendar object as a string, or as the parse
     * Component.
     * It's also possible to specify multiple objects as an array.
     *
     * @param mixed $objects
     *
     * @return void
     */
    function setObjects($objects)
    {
    }
    /**
     * Sets the time range.
     *
     * Any freebusy object falling outside of this time range will be ignored.
     *
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     *
     * @return void
     */
    function setTimeRange(\DateTimeInterface $start = null, \DateTimeInterface $end = null)
    {
    }
    /**
     * Sets the reference timezone for floating times.
     *
     * @param DateTimeZone $timeZone
     *
     * @return void
     */
    function setTimeZone(\DateTimeZone $timeZone)
    {
    }
    /**
     * Parses the input data and returns a correct VFREEBUSY object, wrapped in
     * a VCALENDAR.
     *
     * @return Component
     */
    function getResult()
    {
    }
    /**
     * This method takes a VAVAILABILITY component and figures out all the
     * available times.
     *
     * @param FreeBusyData $fbData
     * @param VCalendar $vavailability
     * @return void
     */
    protected function calculateAvailability(\Sabre\VObject\FreeBusyData $fbData, \Sabre\VObject\Component\VCalendar $vavailability)
    {
    }
    /**
     * This method takes an array of iCalendar objects and applies its busy
     * times on fbData.
     *
     * @param FreeBusyData $fbData
     * @param VCalendar[] $objects
     */
    protected function calculateBusy(\Sabre\VObject\FreeBusyData $fbData, array $objects)
    {
    }
    /**
     * This method takes a FreeBusyData object and generates the VCALENDAR
     * object associated with it.
     *
     * @return VCalendar
     */
    protected function generateFreeBusyCalendar(\Sabre\VObject\FreeBusyData $fbData)
    {
    }
}