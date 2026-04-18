<?php

namespace Illuminate\Support\Testing\Fakes;

class EventFake implements \Illuminate\Contracts\Events\Dispatcher
{
    use \Illuminate\Support\Traits\ReflectsClosures;
    /**
     * The original event dispatcher.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $dispatcher;
    /**
     * The event types that should be intercepted instead of dispatched.
     *
     * @var array
     */
    protected $eventsToFake;
    /**
     * All of the events that have been intercepted keyed by type.
     *
     * @var array
     */
    protected $events = [];
    /**
     * Create a new event fake instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $dispatcher
     * @param  array|string  $eventsToFake
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Events\Dispatcher $dispatcher, $eventsToFake = [])
    {
    }
    /**
     * Assert if an event has a listener attached to it.
     *
     * @param  string  $expectedEvent
     * @param  string  $expectedListener
     * @return void
     */
    public function assertListening($expectedEvent, $expectedListener)
    {
    }
    /**
     * Assert if an event was dispatched based on a truth-test callback.
     *
     * @param  string|\Closure  $event
     * @param  callable|int|null  $callback
     * @return void
     */
    public function assertDispatched($event, $callback = null)
    {
    }
    /**
     * Assert if an event was dispatched a number of times.
     *
     * @param  string  $event
     * @param  int  $times
     * @return void
     */
    public function assertDispatchedTimes($event, $times = 1)
    {
    }
    /**
     * Determine if an event was dispatched based on a truth-test callback.
     *
     * @param  string|\Closure  $event
     * @param  callable|null  $callback
     * @return void
     */
    public function assertNotDispatched($event, $callback = null)
    {
    }
    /**
     * Assert that no events were dispatched.
     *
     * @return void
     */
    public function assertNothingDispatched()
    {
    }
    /**
     * Get all of the events matching a truth-test callback.
     *
     * @param  string  $event
     * @param  callable|null  $callback
     * @return \Illuminate\Support\Collection
     */
    public function dispatched($event, $callback = null)
    {
    }
    /**
     * Determine if the given event has been dispatched.
     *
     * @param  string  $event
     * @return bool
     */
    public function hasDispatched($event)
    {
    }
    /**
     * Register an event listener with the dispatcher.
     *
     * @param  \Closure|string|array  $events
     * @param  mixed  $listener
     * @return void
     */
    public function listen($events, $listener = null)
    {
    }
    /**
     * Determine if a given event has listeners.
     *
     * @param  string  $eventName
     * @return bool
     */
    public function hasListeners($eventName)
    {
    }
    /**
     * Register an event and payload to be dispatched later.
     *
     * @param  string  $event
     * @param  array  $payload
     * @return void
     */
    public function push($event, $payload = [])
    {
    }
    /**
     * Register an event subscriber with the dispatcher.
     *
     * @param  object|string  $subscriber
     * @return void
     */
    public function subscribe($subscriber)
    {
    }
    /**
     * Flush a set of pushed events.
     *
     * @param  string  $event
     * @return void
     */
    public function flush($event)
    {
    }
    /**
     * Fire an event and call the listeners.
     *
     * @param  string|object  $event
     * @param  mixed  $payload
     * @param  bool  $halt
     * @return array|null
     */
    public function dispatch($event, $payload = [], $halt = false)
    {
    }
    /**
     * Determine if an event should be faked or actually dispatched.
     *
     * @param  string  $eventName
     * @param  mixed  $payload
     * @return bool
     */
    protected function shouldFakeEvent($eventName, $payload)
    {
    }
    /**
     * Remove a set of listeners from the dispatcher.
     *
     * @param  string  $event
     * @return void
     */
    public function forget($event)
    {
    }
    /**
     * Forget all of the queued listeners.
     *
     * @return void
     */
    public function forgetPushed()
    {
    }
    /**
     * Dispatch an event and call the listeners.
     *
     * @param  string|object  $event
     * @param  mixed  $payload
     * @return array|null
     */
    public function until($event, $payload = [])
    {
    }
}