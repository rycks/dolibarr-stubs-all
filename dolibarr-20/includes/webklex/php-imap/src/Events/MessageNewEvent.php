<?php

namespace Webklex\PHPIMAP\Events;

/**
 * Class MessageNewEvent
 *
 * @package Webklex\PHPIMAP\Events
 */
class MessageNewEvent extends \Webklex\PHPIMAP\Events\Event
{
    /** @var Message $message */
    public $message;
    /**
     * Create a new event instance.
     * @var Message[] $messages
     * @return void
     */
    public function __construct($messages)
    {
    }
}