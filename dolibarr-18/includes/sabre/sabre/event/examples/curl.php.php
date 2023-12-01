<?php

/**
 * This class is used by curl_async_promise. It should generally only get
 * constructed once.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CurlScheduler
{
    protected $curlMultiHandle;
    function __construct()
    {
    }
    function addHandle($curlHandle)
    {
    }
}
/**
 * This function takes a curl handle as its argument, and returns a Promise.
 *
 * When the request is finished the Promise will resolve. Any curl errors will
 * cause the Promise to reject.
 *
 * @param resource $curlHandle
 * @return Promise
 */
function curl_async_promise($curlHandle)
{
}
function curl_multi_loop_scheduler($mh, callable $done)
{
}