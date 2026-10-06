<?php

namespace Luracast\Restler;

class EventDispatcher
{
    private $listeners = array();
    protected static $_waitList = array();
    public static $self;
    protected $events = array();
    public function __construct()
    {
    }
    public static function __callStatic($eventName, $params)
    {
    }
    public function __call($eventName, $params)
    {
    }
    public static function addListener($eventName, \Closure $callback)
    {
    }
    public function on(array $eventHandlers)
    {
    }
    /**
     * Fire an event to notify all listeners
     *
     * @param string $eventName name of the event
     * @param array  $params    event related data
     */
    protected function dispatch($eventName, array $params = array())
    {
    }
}