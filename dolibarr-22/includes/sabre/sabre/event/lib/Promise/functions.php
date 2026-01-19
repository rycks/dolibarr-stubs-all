<?php

namespace Sabre\Event\Promise;

/**
 * This file contains a set of functions that are useful for dealing with the
 * Promise object.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
/**
 * This function takes an array of Promises, and returns a Promise that
 * resolves when all the given arguments have resolved.
 *
 * The returned Promise will resolve with a value that's an array of all the
 * values the given promises have been resolved with.
 *
 * This array will be in the exact same order as the array of input promises.
 *
 * If any of the given Promises fails, the returned promise will immediately
 * fail with the first Promise that fails, and its reason.
 *
 * @param Promise[] $promises
 */
function all(array $promises) : \Sabre\Event\Promise
{
}
/**
 * The race function returns a promise that resolves or rejects as soon as
 * one of the promises in the argument resolves or rejects.
 *
 * The returned promise will resolve or reject with the value or reason of
 * that first promise.
 *
 * @param Promise[] $promises
 */
function race(array $promises) : \Sabre\Event\Promise
{
}
/**
 * Returns a Promise that resolves with the given value.
 *
 * If the value is a promise, the returned promise will attach itself to that
 * promise and eventually get the same state as the followed promise.
 *
 * @param mixed $value
 */
function resolve($value) : \Sabre\Event\Promise
{
}
/**
 * Returns a Promise that will reject with the given reason.
 */
function reject(\Throwable $reason) : \Sabre\Event\Promise
{
}