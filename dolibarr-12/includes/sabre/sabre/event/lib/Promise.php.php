<?php

namespace Sabre\Event;

/**
 * An implementation of the Promise pattern.
 *
 * A promise represents the result of an asynchronous operation.
 * At any given point a promise can be in one of three states:
 *
 * 1. Pending (the promise does not have a result yet).
 * 2. Fulfilled (the asynchronous operation has completed with a result).
 * 3. Rejected (the asynchronous operation has completed with an error).
 *
 * To get a callback when the operation has finished, use the `then` method.
 *
 * @copyright Copyright (C) 2013-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Promise
{
    /**
     * The asynchronous operation is pending.
     */
    const PENDING = 0;
    /**
     * The asynchronous operation has completed, and has a result.
     */
    const FULFILLED = 1;
    /**
     * The asynchronous operation has completed with an error.
     */
    const REJECTED = 2;
    /**
     * The current state of this promise.
     *
     * @var int
     */
    public $state = self::PENDING;
    /**
     * Creates the promise.
     *
     * The passed argument is the executor. The executor is automatically
     * called with two arguments.
     *
     * Each are callbacks that map to $this->fulfill and $this->reject.
     * Using the executor is optional.
     *
     * @param callable $executor
     */
    function __construct(callable $executor = null)
    {
    }
    /**
     * This method allows you to specify the callback that will be called after
     * the promise has been fulfilled or rejected.
     *
     * Both arguments are optional.
     *
     * This method returns a new promise, which can be used for chaining.
     * If either the onFulfilled or onRejected callback is called, you may
     * return a result from this callback.
     *
     * If the result of this callback is yet another promise, the result of
     * _that_ promise will be used to set the result of the returned promise.
     *
     * If either of the callbacks return any other value, the returned promise
     * is automatically fulfilled with that value.
     *
     * If either of the callbacks throw an exception, the returned promise will
     * be rejected and the exception will be passed back.
     *
     * @param callable $onFulfilled
     * @param callable $onRejected
     * @return Promise
     */
    function then(callable $onFulfilled = null, callable $onRejected = null)
    {
    }
    /**
     * Add a callback for when this promise is rejected.
     *
     * Its usage is identical to then(). However, the otherwise() function is
     * preferred.
     *
     * @param callable $onRejected
     * @return Promise
     */
    function otherwise(callable $onRejected)
    {
    }
    /**
     * Marks this promise as fulfilled and sets its return value.
     *
     * @param mixed $value
     * @return void
     */
    function fulfill($value = null)
    {
    }
    /**
     * Marks this promise as rejected, and set it's rejection reason.
     *
     * While it's possible to use any PHP value as the reason, it's highly
     * recommended to use an Exception for this.
     *
     * @param mixed $reason
     * @return void
     */
    function reject($reason = null)
    {
    }
    /**
     * Stops execution until this promise is resolved.
     *
     * This method stops exection completely. If the promise is successful with
     * a value, this method will return this value. If the promise was
     * rejected, this method will throw an exception.
     *
     * This effectively turns the asynchronous operation into a synchronous
     * one. In PHP it might be useful to call this on the last promise in a
     * chain.
     *
     * @throws Exception
     * @return mixed
     */
    function wait()
    {
    }
    /**
     * A list of subscribers. Subscribers are the callbacks that want us to let
     * them know if the callback was fulfilled or rejected.
     *
     * @var array
     */
    protected $subscribers = [];
    /**
     * The result of the promise.
     *
     * If the promise was fulfilled, this will be the result value. If the
     * promise was rejected, this property hold the rejection reason.
     *
     * @var mixed
     */
    protected $value = null;
    /**
     * This method is used to call either an onFulfilled or onRejected callback.
     *
     * This method makes sure that the result of these callbacks are handled
     * correctly, and any chained promises are also correctly fulfilled or
     * rejected.
     *
     * @param Promise $subPromise
     * @param callable $callBack
     * @return void
     */
    private function invokeCallback(\Sabre\Event\Promise $subPromise, callable $callBack = null)
    {
    }
    /**
     * Alias for 'otherwise'.
     *
     * This function is now deprecated and will be removed in a future version.
     *
     * @param callable $onRejected
     * @deprecated
     * @return Promise
     */
    function error(callable $onRejected)
    {
    }
    /**
     * Deprecated.
     *
     * Please use Sabre\Event\Promise::all
     *
     * @param Promise[] $promises
     * @deprecated
     * @return Promise
     */
    static function all(array $promises)
    {
    }
}