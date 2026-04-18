<?php

namespace Sabre\VObject\TimezoneGuesser;

/**
 * Some clients add 'X-LIC-LOCATION' with the olson name.
 */
class FindFromTimezoneIdentifier implements \Sabre\VObject\TimezoneGuesser\TimezoneFinder
{
    public function find(string $tzid, bool $failIfUncertain = false) : ?\DateTimeZone
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
     */
    private function getIdentifiersBC()
    {
    }
}