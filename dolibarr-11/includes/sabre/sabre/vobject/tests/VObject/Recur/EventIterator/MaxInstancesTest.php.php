<?php

namespace Sabre\VObject\Recur\EventIterator;

class MaxInstancesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Sabre\VObject\Recur\MaxInstancesExceededException
     */
    function testExceedMaxRecurrences()
    {
    }
}