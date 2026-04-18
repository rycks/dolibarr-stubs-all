<?php

namespace Illuminate\Support\Testing\Fakes;

class BusFake implements \Illuminate\Contracts\Bus\QueueingDispatcher
{
    use \Illuminate\Support\Traits\ReflectsClosures;
    /**
     * The original Bus dispatcher implementation.
     *
     * @var \Illuminate\Contracts\Bus\QueueingDispatcher
     */
    protected $dispatcher;
    /**
     * The job types that should be intercepted instead of dispatched.
     *
     * @var array
     */
    protected $jobsToFake;
    /**
     * The commands that have been dispatched.
     *
     * @var array
     */
    protected $commands = [];
    /**
     * The commands that have been dispatched synchronously.
     *
     * @var array
     */
    protected $commandsSync = [];
    /**
     * The commands that have been dispatched after the response has been sent.
     *
     * @var array
     */
    protected $commandsAfterResponse = [];
    /**
     * The batches that have been dispatched.
     *
     * @var array
     */
    protected $batches = [];
    /**
     * Create a new bus fake instance.
     *
     * @param  \Illuminate\Contracts\Bus\QueueingDispatcher  $dispatcher
     * @param  array|string  $jobsToFake
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Bus\QueueingDispatcher $dispatcher, $jobsToFake = [])
    {
    }
    /**
     * Assert if a job was dispatched based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|int|null  $callback
     * @return void
     */
    public function assertDispatched($command, $callback = null)
    {
    }
    /**
     * Assert if a job was pushed a number of times.
     *
     * @param  string  $command
     * @param  int  $times
     * @return void
     */
    public function assertDispatchedTimes($command, $times = 1)
    {
    }
    /**
     * Determine if a job was dispatched based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|null  $callback
     * @return void
     */
    public function assertNotDispatched($command, $callback = null)
    {
    }
    /**
     * Assert that no jobs were dispatched.
     *
     * @return void
     */
    public function assertNothingDispatched()
    {
    }
    /**
     * Assert if a job was explicitly dispatched synchronously based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|int|null  $callback
     * @return void
     */
    public function assertDispatchedSync($command, $callback = null)
    {
    }
    /**
     * Assert if a job was pushed synchronously a number of times.
     *
     * @param  string  $command
     * @param  int  $times
     * @return void
     */
    public function assertDispatchedSyncTimes($command, $times = 1)
    {
    }
    /**
     * Determine if a job was dispatched based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|null  $callback
     * @return void
     */
    public function assertNotDispatchedSync($command, $callback = null)
    {
    }
    /**
     * Assert if a job was dispatched after the response was sent based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|int|null  $callback
     * @return void
     */
    public function assertDispatchedAfterResponse($command, $callback = null)
    {
    }
    /**
     * Assert if a job was pushed after the response was sent a number of times.
     *
     * @param  string  $command
     * @param  int  $times
     * @return void
     */
    public function assertDispatchedAfterResponseTimes($command, $times = 1)
    {
    }
    /**
     * Determine if a job was dispatched based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|null  $callback
     * @return void
     */
    public function assertNotDispatchedAfterResponse($command, $callback = null)
    {
    }
    /**
     * Assert if a chain of jobs was dispatched.
     *
     * @param  array  $expectedChain
     * @return void
     */
    public function assertChained(array $expectedChain)
    {
    }
    /**
     * Reset the chain properties to their default values on the job.
     *
     * @param  mixed  $job
     * @return mixed
     */
    protected function resetChainPropertiesToDefaults($job)
    {
    }
    /**
     * Assert if a job was dispatched with an empty chain based on a truth-test callback.
     *
     * @param  string|\Closure  $command
     * @param  callable|null  $callback
     * @return void
     */
    public function assertDispatchedWithoutChain($command, $callback = null)
    {
    }
    /**
     * Assert if a job was dispatched with chained jobs based on a truth-test callback.
     *
     * @param  string  $command
     * @param  array  $expectedChain
     * @param  callable|null  $callback
     * @return void
     */
    protected function assertDispatchedWithChainOfObjects($command, $expectedChain, $callback)
    {
    }
    /**
     * Assert if a job was dispatched with chained jobs based on a truth-test callback.
     *
     * @param  string  $command
     * @param  array  $expectedChain
     * @param  callable|null  $callback
     * @return void
     */
    protected function assertDispatchedWithChainOfClasses($command, $expectedChain, $callback)
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
     * Assert if a batch was dispatched based on a truth-test callback.
     *
     * @param  callable  $callback
     * @return void
     */
    public function assertBatched(callable $callback)
    {
    }
    /**
     * Assert the number of batches that have been dispatched.
     *
     * @param  int  $count
     * @return void
     */
    public function assertBatchCount($count)
    {
    }
    /**
     * Get all of the jobs matching a truth-test callback.
     *
     * @param  string  $command
     * @param  callable|null  $callback
     * @return \Illuminate\Support\Collection
     */
    public function dispatched($command, $callback = null)
    {
    }
    /**
     * Get all of the jobs dispatched synchronously matching a truth-test callback.
     *
     * @param  string  $command
     * @param  callable|null  $callback
     * @return \Illuminate\Support\Collection
     */
    public function dispatchedSync(string $command, $callback = null)
    {
    }
    /**
     * Get all of the jobs dispatched after the response was sent matching a truth-test callback.
     *
     * @param  string  $command
     * @param  callable|null  $callback
     * @return \Illuminate\Support\Collection
     */
    public function dispatchedAfterResponse(string $command, $callback = null)
    {
    }
    /**
     * Get all of the pending batches matching a truth-test callback.
     *
     * @param  callable  $callback
     * @return \Illuminate\Support\Collection
     */
    public function batched(callable $callback)
    {
    }
    /**
     * Determine if there are any stored commands for a given class.
     *
     * @param  string  $command
     * @return bool
     */
    public function hasDispatched($command)
    {
    }
    /**
     * Determine if there are any stored commands for a given class.
     *
     * @param  string  $command
     * @return bool
     */
    public function hasDispatchedSync($command)
    {
    }
    /**
     * Determine if there are any stored commands for a given class.
     *
     * @param  string  $command
     * @return bool
     */
    public function hasDispatchedAfterResponse($command)
    {
    }
    /**
     * Dispatch a command to its appropriate handler.
     *
     * @param  mixed  $command
     * @return mixed
     */
    public function dispatch($command)
    {
    }
    /**
     * Dispatch a command to its appropriate handler in the current process.
     *
     * Queueable jobs will be dispatched to the "sync" queue.
     *
     * @param  mixed  $command
     * @param  mixed  $handler
     * @return mixed
     */
    public function dispatchSync($command, $handler = null)
    {
    }
    /**
     * Dispatch a command to its appropriate handler in the current process.
     *
     * @param  mixed  $command
     * @param  mixed  $handler
     * @return mixed
     */
    public function dispatchNow($command, $handler = null)
    {
    }
    /**
     * Dispatch a command to its appropriate handler behind a queue.
     *
     * @param  mixed  $command
     * @return mixed
     */
    public function dispatchToQueue($command)
    {
    }
    /**
     * Dispatch a command to its appropriate handler.
     *
     * @param  mixed  $command
     * @return mixed
     */
    public function dispatchAfterResponse($command)
    {
    }
    /**
     * Create a new chain of queueable jobs.
     *
     * @param  \Illuminate\Support\Collection|array  $jobs
     * @return \Illuminate\Foundation\Bus\PendingChain
     */
    public function chain($jobs)
    {
    }
    /**
     * Attempt to find the batch with the given ID.
     *
     * @param  string  $batchId
     * @return \Illuminate\Bus\Batch|null
     */
    public function findBatch(string $batchId)
    {
    }
    /**
     * Create a new batch of queueable jobs.
     *
     * @param  \Illuminate\Support\Collection|array  $jobs
     * @return \Illuminate\Bus\PendingBatch
     */
    public function batch($jobs)
    {
    }
    /**
     * Record the fake pending batch dispatch.
     *
     * @param  \Illuminate\Bus\PendingBatch  $pendingBatch
     * @return \Illuminate\Bus\Batch
     */
    public function recordPendingBatch(\Illuminate\Bus\PendingBatch $pendingBatch)
    {
    }
    /**
     * Determine if a command should be faked or actually dispatched.
     *
     * @param  mixed  $command
     * @return bool
     */
    protected function shouldFakeJob($command)
    {
    }
    /**
     * Set the pipes commands should be piped through before dispatching.
     *
     * @param  array  $pipes
     * @return $this
     */
    public function pipeThrough(array $pipes)
    {
    }
    /**
     * Determine if the given command has a handler.
     *
     * @param  mixed  $command
     * @return bool
     */
    public function hasCommandHandler($command)
    {
    }
    /**
     * Retrieve the handler for a command.
     *
     * @param  mixed  $command
     * @return mixed
     */
    public function getCommandHandler($command)
    {
    }
    /**
     * Map a command to a handler.
     *
     * @param  array  $map
     * @return $this
     */
    public function map(array $map)
    {
    }
}