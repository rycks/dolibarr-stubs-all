<?php

namespace Sabre\VObject;

/**
 * Time zone name translation.
 *
 * This file translates well-known time zone names into "Olson database" time zone names.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Frank Edelhaeuser (fedel@users.sourceforge.net)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class TimeZoneUtil
{
    /** @var self */
    private static $instance = null;
    /** @var TimezoneGuesser[] */
    private $timezoneGuessers = [];
    /** @var TimezoneFinder[] */
    private $timezoneFinders = [];
    private function __construct()
    {
    }
    private static function getInstance() : self
    {
    }
    private function addGuesser(string $key, \Sabre\VObject\TimezoneGuesser\TimezoneGuesser $guesser) : void
    {
    }
    private function addFinder(string $key, \Sabre\VObject\TimezoneGuesser\TimezoneFinder $finder) : void
    {
    }
    /**
     * This method will try to find out the correct timezone for an iCalendar
     * date-time value.
     *
     * You must pass the contents of the TZID parameter, as well as the full
     * calendar.
     *
     * If the lookup fails, this method will return the default PHP timezone
     * (as configured using date_default_timezone_set, or the date.timezone ini
     * setting).
     *
     * Alternatively, if $failIfUncertain is set to true, it will throw an
     * exception if we cannot accurately determine the timezone.
     */
    private function findTimeZone(string $tzid, \Sabre\VObject\Component $vcalendar = null, bool $failIfUncertain = false) : \DateTimeZone
    {
    }
    public static function addTimezoneGuesser(string $key, \Sabre\VObject\TimezoneGuesser\TimezoneGuesser $guesser) : void
    {
    }
    public static function addTimezoneFinder(string $key, \Sabre\VObject\TimezoneGuesser\TimezoneFinder $finder) : void
    {
    }
    /**
     * @param string $tzid
     * @param false  $failIfUncertain
     *
     * @return DateTimeZone
     */
    public static function getTimeZone($tzid, \Sabre\VObject\Component $vcalendar = null, $failIfUncertain = false)
    {
    }
    public static function clean() : void
    {
    }
    // Keeping things for backwards compatibility
    /**
     * @var array|null
     *
     * @deprecated
     */
    public static $map = null;
    /**
     * List of microsoft exchange timezone ids.
     *
     * Source: http://msdn.microsoft.com/en-us/library/aa563018(loband).aspx
     *
     * @deprecated
     */
    public static $microsoftExchangeMap = [
        0 => 'UTC',
        31 => 'Africa/Casablanca',
        // Insanely, id #2 is used for both Europe/Lisbon, and Europe/Sarajevo.
        // I'm not even kidding.. We handle this special case in the
        // getTimeZone method.
        2 => 'Europe/Lisbon',
        1 => 'Europe/London',
        4 => 'Europe/Berlin',
        6 => 'Europe/Prague',
        3 => 'Europe/Paris',
        69 => 'Africa/Luanda',
        // This was a best guess
        7 => 'Europe/Athens',
        5 => 'Europe/Bucharest',
        49 => 'Africa/Cairo',
        50 => 'Africa/Harare',
        59 => 'Europe/Helsinki',
        27 => 'Asia/Jerusalem',
        26 => 'Asia/Baghdad',
        74 => 'Asia/Kuwait',
        51 => 'Europe/Moscow',
        56 => 'Africa/Nairobi',
        25 => 'Asia/Tehran',
        24 => 'Asia/Muscat',
        // Best guess
        54 => 'Asia/Baku',
        48 => 'Asia/Kabul',
        58 => 'Asia/Yekaterinburg',
        47 => 'Asia/Karachi',
        23 => 'Asia/Calcutta',
        62 => 'Asia/Kathmandu',
        46 => 'Asia/Almaty',
        71 => 'Asia/Dhaka',
        66 => 'Asia/Colombo',
        61 => 'Asia/Rangoon',
        22 => 'Asia/Bangkok',
        64 => 'Asia/Krasnoyarsk',
        45 => 'Asia/Shanghai',
        63 => 'Asia/Irkutsk',
        21 => 'Asia/Singapore',
        73 => 'Australia/Perth',
        75 => 'Asia/Taipei',
        20 => 'Asia/Tokyo',
        72 => 'Asia/Seoul',
        70 => 'Asia/Yakutsk',
        19 => 'Australia/Adelaide',
        44 => 'Australia/Darwin',
        18 => 'Australia/Brisbane',
        76 => 'Australia/Sydney',
        43 => 'Pacific/Guam',
        42 => 'Australia/Hobart',
        68 => 'Asia/Vladivostok',
        41 => 'Asia/Magadan',
        17 => 'Pacific/Auckland',
        40 => 'Pacific/Fiji',
        67 => 'Pacific/Tongatapu',
        29 => 'Atlantic/Azores',
        53 => 'Atlantic/Cape_Verde',
        30 => 'America/Noronha',
        8 => 'America/Sao_Paulo',
        // Best guess
        32 => 'America/Argentina/Buenos_Aires',
        60 => 'America/Godthab',
        28 => 'America/St_Johns',
        9 => 'America/Halifax',
        33 => 'America/Caracas',
        65 => 'America/Santiago',
        35 => 'America/Bogota',
        10 => 'America/New_York',
        34 => 'America/Indiana/Indianapolis',
        55 => 'America/Guatemala',
        11 => 'America/Chicago',
        37 => 'America/Mexico_City',
        36 => 'America/Edmonton',
        38 => 'America/Phoenix',
        12 => 'America/Denver',
        // Best guess
        13 => 'America/Los_Angeles',
        // Best guess
        14 => 'America/Anchorage',
        15 => 'Pacific/Honolulu',
        16 => 'Pacific/Midway',
        39 => 'Pacific/Kwajalein',
    ];
    /**
     * This method will load in all the tz mapping information, if it's not yet
     * done.
     *
     * @deprecated
     */
    public static function loadTzMaps()
    {
    }
    /**
     * This method returns an array of timezone identifiers, that are supported
     * by DateTimeZone(), but not returned by DateTimeZone::listIdentifiers().
     *
     * We're not using DateTimeZone::listIdentifiers(DateTimeZone::ALL_WITH_BC) because:
     * - It's not supported by some PHP versions as well as HHVM.
     * - It also returns identifiers, that are invalid values for new DateTimeZone() on some PHP versions.
     * (See timezonedata/php-bc.php and timezonedata php-workaround.php)
     *
     * @return array
     *
     * @deprecated
     */
    public static function getIdentifiersBC()
    {
    }
}