<?php

namespace Sabre\DAV;

/**
 * The MockLogger is a simple PSR-3 implementation that we can use to test
 * whether things get logged correctly.
 *
 * @copyright Copyright (C) fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MockLogger extends \Psr\Log\AbstractLogger
{
    public $logs = [];
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    function log($level, $message, array $context = [])
    {
    }
}