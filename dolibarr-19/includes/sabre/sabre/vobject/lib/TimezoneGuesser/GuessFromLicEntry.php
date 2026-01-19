<?php

namespace Sabre\VObject\TimezoneGuesser;

/**
 * Some clients add 'X-LIC-LOCATION' with the olson name.
 */
class GuessFromLicEntry implements \Sabre\VObject\TimezoneGuesser\TimezoneGuesser
{
    public function guess(\Sabre\VObject\Component\VTimeZone $vtimezone, bool $failIfUncertain = false) : ?\DateTimeZone
    {
    }
}