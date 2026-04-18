<?php

namespace Webklex\PHPIMAP\Events;

/**
 * Class FlagNewEvent
 *
 * @package Webklex\PHPIMAP\Events
 */
class FlagNewEvent extends \Webklex\PHPIMAP\Events\Event
{
    /** @var Message $message */
    public $message;
    /** @var string $flag */
    public $flag;
    /**
     * Create a new event instance.
     * @var mixed[] $arguments
     * @return void
     */
    public function __construct($arguments)
    {
    }
}