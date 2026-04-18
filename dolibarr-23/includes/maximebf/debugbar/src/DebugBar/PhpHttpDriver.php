<?php

namespace DebugBar;

/**
 * HTTP driver for native php
 */
class PhpHttpDriver implements \DebugBar\HttpDriverInterface
{
    /**
     * @param array $headers
     */
    function setHeaders(array $headers)
    {
    }
    /**
     * @return bool
     */
    function isSessionStarted()
    {
    }
    /**
     * @param string $name
     * @param string $value
     */
    function setSessionValue($name, $value)
    {
    }
    /**
     * @param string $name
     * @return bool
     */
    function hasSessionValue($name)
    {
    }
    /**
     * @param string $name
     * @return mixed
     */
    function getSessionValue($name)
    {
    }
    /**
     * @param string $name
     */
    function deleteSessionValue($name)
    {
    }
}