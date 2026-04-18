<?php

namespace Webklex\PHPIMAP\Traits;

/**
 * Trait HasEvents
 *
 * @package Webklex\PHPIMAP\Traits
 */
trait HasEvents
{
    /**
     * Event holder
     *
     * @var array $events
     */
    protected $events = [];
    /**
     * Set a specific event
     * @param $section
     * @param $event
     * @param $class
     */
    public function setEvent($section, $event, $class)
    {
    }
    /**
     * Set all events
     * @param $events
     */
    public function setEvents($events)
    {
    }
    /**
     * Get a specific event callback
     * @param $section
     * @param $event
     *
     * @return Event
     * @throws EventNotFoundException
     */
    public function getEvent($section, $event)
    {
    }
    /**
     * Get all events
     *
     * @return array
     */
    public function getEvents()
    {
    }
}