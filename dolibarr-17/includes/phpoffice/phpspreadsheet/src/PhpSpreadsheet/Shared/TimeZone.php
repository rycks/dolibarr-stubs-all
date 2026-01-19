<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class TimeZone
{
    /**
     * Default Timezone used for date/time conversions.
     *
     * @var string
     */
    protected static $timezone = 'UTC';
    /**
     * Validate a Timezone name.
     *
     * @param string $timezone Time zone (e.g. 'Europe/London')
     *
     * @return bool Success or failure
     */
    private static function validateTimeZone($timezone)
    {
    }
    /**
     * Set the Default Timezone used for date/time conversions.
     *
     * @param string $timezone Time zone (e.g. 'Europe/London')
     *
     * @return bool Success or failure
     */
    public static function setTimeZone($timezone)
    {
    }
    /**
     * Return the Default Timezone used for date/time conversions.
     *
     * @return string Timezone (e.g. 'Europe/London')
     */
    public static function getTimeZone()
    {
    }
    /**
     *    Return the Timezone offset used for date/time conversions to/from UST
     * This requires both the timezone and the calculated date/time to allow for local DST.
     *
     * @param string $timezone The timezone for finding the adjustment to UST
     * @param int $timestamp PHP date/time value
     *
     * @throws PhpSpreadsheetException
     *
     * @return int Number of seconds for timezone adjustment
     */
    public static function getTimeZoneAdjustment($timezone, $timestamp)
    {
    }
}