<?php

namespace Sabre\VObject\TimezoneGuesser;

interface TimezoneGuesser
{
    public function guess(\Sabre\VObject\Component\VTimeZone $vtimezone, bool $failIfUncertain = false) : ?\DateTimeZone;
}