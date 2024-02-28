<?php

namespace Sabre\VObject\Recur;

class BySetPosHangTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Using this iCalendar object, including BYSETPOS=-2 causes the iterator
     * to hang, as reported in ticket #212.
     *
     * See: https://github.com/fruux/sabre-vobject/issues/212
     */
    function testExpand()
    {
    }
}