<?php

namespace Webklex\PHPIMAP\Events;

/**
 * Class MessageMovedEvent
 *
 * @package Webklex\PHPIMAP\Events
 */
class MessageMovedEvent extends \Webklex\PHPIMAP\Events\Event
{
    /** @var Message $old_message */
    public $old_message;
    /** @var Message $new_message */
    public $new_message;
    /**
     * Create a new event instance.
     * @var Message[] $messages
     * @return void
     */
    public function __construct($messages)
    {
    }
}