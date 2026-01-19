<?php

namespace Sabre\Event\Loop;

/**
 * Executes a function after x seconds.
 *
 * @return void
 */
function setTimeout(callable $cb, float $timeout)
{
}
/**
 * Executes a function every x seconds.
 *
 * The value this function returns can be used to stop the interval with
 * clearInterval.
 */
function setInterval(callable $cb, float $timeout) : array
{
}
/**
 * Stops a running interval.
 *
 * @return void
 */
function clearInterval(array $intervalId)
{
}
/**
 * Runs a function immediately at the next iteration of the loop.
 *
 * @return void
 */
function nextTick(callable $cb)
{
}
/**
 * Adds a read stream.
 *
 * The callback will be called as soon as there is something to read from
 * the stream.
 *
 * You MUST call removeReadStream after you are done with the stream, to
 * prevent the eventloop from never stopping.
 *
 * @param resource $stream
 * @return void
 */
function addReadStream($stream, callable $cb)
{
}
/**
 * Adds a write stream.
 *
 * The callback will be called as soon as the system reports it's ready to
 * receive writes on the stream.
 *
 * You MUST call removeWriteStream after you are done with the stream, to
 * prevent the eventloop from never stopping.
 *
 * @param resource $stream
 * @return void
 */
function addWriteStream($stream, callable $cb)
{
}
/**
 * Stop watching a stream for reads.
 *
 * @param resource $stream
 * @return void
 */
function removeReadStream($stream)
{
}
/**
 * Stop watching a stream for writes.
 *
 * @param resource $stream
 * @return void
 */
function removeWriteStream($stream)
{
}
/**
 * Runs the loop.
 *
 * This function will run continiously, until there's no more events to
 * handle.
 *
 * @return void
 */
function run()
{
}
/**
 * Executes all pending events.
 *
 * If $block is turned true, this function will block until any event is
 * triggered.
 *
 * If there are now timeouts, nextTick callbacks or events in the loop at
 * all, this function will exit immediately.
 *
 * This function will return true if there are _any_ events left in the
 * loop after the tick.
 */
function tick(bool $block = false) : bool
{
}
/**
 * Stops a running eventloop
 *
 * @return void
 */
function stop()
{
}
/**
 * Retrieves or sets the global Loop object.
 */
function instance(\Sabre\Event\Loop\Loop $newLoop = null) : \Sabre\Event\Loop\Loop
{
}