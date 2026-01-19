<?php

namespace Sabre\Xml;

class InfiteLoopTest extends \PHPUnit_Framework_TestCase
{
    /**
     * This particular xml body caused the parser to go into an infinite loop.
     * Need to know why.
     */
    function testDeserialize()
    {
    }
}