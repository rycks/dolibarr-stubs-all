<?php

namespace Sabre\VObject\ITip;

class EvolutionTest extends \Sabre\VObject\ITip\BrokerTester
{
    /**
     * Evolution does things as usual a little bit differently.
     *
     * We're adding a seprate test just for it.
     */
    function testNewEvolutionEvent()
    {
    }
    /**
     * This is an event originally from evolution, then parsed by sabredav and
     * again mangled by iCal. This triggered a few bugs related to email
     * address scheme casing.
     */
    function testAttendeeModify()
    {
    }
}