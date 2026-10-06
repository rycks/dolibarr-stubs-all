<?php

namespace Illuminate\Support\Testing\Fakes;

class QueueFake extends \Illuminate\Queue\QueueManager implements \Illuminate\Contracts\Queue\Queue
{
    use \Illuminate\Support\Traits\ReflectsClosures;
    /**
     * All of the jobs that have been pushed.
     *
     * @var array
     */
    protected $jobs = [];
    /**
     * Assert if a job was pushed based on a truth-test callback.
     *
     * @param  string|\Closure  $job
     * @param  callable|int|null  $callback
     * @return void
     */
    public function assertPushed($job, $callback = null)
    {
    }
    /**
     * Assert if a job was pushed a number of times.
     *
     * @param  string  $job
     * @param  int  $times
     * @return void
     */
    protected function assertPushedTimes($job, $times = 1)
    {
    }
    /**
     * Assert if a job was pushed based on a truth-test callback.
     *
     * @param  string  $queue
     * @param  string|\Closure  $job
     * @param  callable|null  $callback
     * @return void
     */
    public function assertPushedOn($queue, $job, $callback = null)
    {
    }
    /**
     * Assert if a job was pushed with chained jobs based on a truth-test callback.
     *
     * @param  string  $job
     * @param  array  $expectedChain
     * @param  callable|null  $callback
     * @return void
     */
    public function assertPushedWithChain($job, $expectedChain = [], $callback = null)
    {
    }
    /**
     * Assert if a job was pushed with an empty chain based on a truth-test callback.
     *
     * @param  string  $job
     * @param  callable|null  $callback
     * @return void
     */
    public function assertPushedWithoutChain($job, $callback = null)
    {
    }
    /**
     * Assert if a job was pushed with chained jobs based on a truth-test callback.
     *
     * @param  string  $job
     * @param  array  $expectedChain
     * @param  callable|null  $callback
     * @return void
     */
    protected function assertPushedWithChainOfObjects($job, $expectedChain, $callback)
    {
    }
    /**
     * Assert if a job was pushed with chained jobs based on a truth-test callback.
     *
     * @param  string  $job
     * @param  array  $expectedChain
     * @param  callable|null  $callback
     * @return void
     */
    protected function assertPushedWithChainOfClasses($job, $expectedChain, $callback)
    {
    }
    /**
     * Determine if the given chain is entirely composed of objects.
     *
     * @param  array  $chain
     * @return bool
     */
    protected function isChainOfObjects($chain)
    {
    }
    /**
     * Determine if a job was pushed based on a truth-test callback.
     *
     * @param  string|\Closure  $job
     * @param  callable|null  $callback
     * @return void
     */
    public function assertNotPushed($job, $callback = null)
    {
    }
    /**
     * Assert that no jobs were pushed.
     *
     * @return void
     */
    public function assertNothingPushed()
    {
    }
    /**
     * Get all of the jobs matching a truth-test callback.
     *
     * @param  string  $job
     * @param  callable|null  $callback
     * @return \Illuminate\Support\Collection
     */
    public function pushed($job, $callback = null)
    {
    }
    /**
     * Determine if there are any stored jobs for a given class.
     *
     * @param  string  $job
     * @return bool
     */
    public function hasPushed($job)
    {
    }
    /**
     * Resolve a queue connection instance.
     *
     * @param  mixed  $value
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connection($value = null)
    {
    }
    /**
     * Get the size of the queue.
     *
     * @param  string|null  $queue
     * @return int
     */
    public function size($queue = null)
    {
    }
    /**
     * Push a new job onto the queue.
     *
     * @param  string|object  $job
     * @param  mixed  $data
     * @param  string|null  $queue
     * @return mixed
     */
    public function push($job, $data = '', $queue = null)
    {
    }
    /**
     * Push a raw payload onto the queue.
     *
     * @param  string  $payload
     * @param  string|null  $queue
     * @param  array  $options
     * @return mixed
     */
    public function pushRaw($payload, $queue = null, array $options = [])
    {
    }
    /**
     * Push a new job onto the queue after a delay.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string|object  $job
     * @param  mixed  $data
     * @param  string|null  $queue
     * @return mixed
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
    }
    /**
     * Push a new job onto the queue.
     *
     * @param  string  $queue
     * @param  string|object  $job
     * @param  mixed  $data
     * @return mixed
     */
    public function pushOn($queue, $job, $data = '')
    {
    }
    /**
     * Push a new job onto the queue after a delay.
     *
     * @param  string  $queue
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string|object  $job
     * @param  mixed  $data
     * @return mixed
     */
    public function laterOn($queue, $delay, $job, $data = '')
    {
    }
    /**
     * Pop the next job off of the queue.
     *
     * @param  string|null  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
    }
    /**
     * Push an array of jobs onto the queue.
     *
     * @param  array  $jobs
     * @param  mixed  $data
     * @param  string|null  $queue
     * @return mixed
     */
    public function bulk($jobs, $data = '', $queue = null)
    {
    }
    /**
     * Get the jobs that have been pushed.
     *
     * @return array
     */
    public function pushedJobs()
    {
    }
    /**
     * Get the connection name for the queue.
     *
     * @return string
     */
    public function getConnectionName()
    {
    }
    /**
     * Set the connection name for the queue.
     *
     * @param  string  $name
     * @return $this
     */
    public function setConnectionName($name)
    {
    }
    /**
     * Override the QueueManager to prevent circular dependency.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
    }
}