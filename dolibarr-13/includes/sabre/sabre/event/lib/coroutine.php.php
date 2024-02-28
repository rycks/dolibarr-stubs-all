<?php

namespace Sabre\Event;

/**
 * Turn asynchronous promise-based code into something that looks synchronous
 * again, through the use of generators.
 *
 * Example without coroutines:
 *
 * $promise = $httpClient->request('GET', '/foo');
 * $promise->then(function($value) {
 *
 *   return $httpClient->request('DELETE','/foo');
 *
 * })->then(function($value) {
 *
 *   return $httpClient->request('PUT', '/foo');
 *
 * })->error(function($reason) {
 *
 *   echo "Failed because: $reason\n";
 *
 * });
 *
 * Example with coroutines:
 *
 * coroutine(function() {
 *
 *   try {
 *     yield $httpClient->request('GET', '/foo');
 *     yield $httpClient->request('DELETE', /foo');
 *     yield $httpClient->request('PUT', '/foo');
 *   } catch(\Exception $reason) {
 *     echo "Failed because: $reason\n";
 *   }
 *
 * });
 *
 * @copyright Copyright (C) 2013-2015 fruux GmbH. All rights reserved.
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
function coroutine(callable $gen)
{
}