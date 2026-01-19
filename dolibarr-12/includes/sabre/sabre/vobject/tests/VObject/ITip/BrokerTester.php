<?php

namespace Sabre\VObject\ITip;

/**
 * Utilities for testing the broker
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class BrokerTester extends \PHPUnit_Framework_TestCase
{
    use \Sabre\VObject\PHPUnitAssertions;
    function parse($oldMessage, $newMessage, $expected = [], $currentUser = 'mailto:one@example.org')
    {
    }
    function process($input, $existingObject = null, $expected = false)
    {
    }
}