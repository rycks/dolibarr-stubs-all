<?php

namespace Sabre\VObject\TimezoneGuesser;

/**
 * Some clients add 'X-LIC-LOCATION' with the olson name.
 */
class FindFromOffset implements \Sabre\VObject\TimezoneGuesser\TimezoneFinder
{
    public function find(string $tzid, bool $failIfUncertain = false) : ?\DateTimeZone
    {
    }
}