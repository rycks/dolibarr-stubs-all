<?php

namespace PhpOffice\PhpSpreadsheet\Collection;

/**
 * This is the default implementation for in-memory cell collection.
 *
 * Alternatives implementation should leverage off-memory, non-volatile storage
 * to reduce overall memory usage.
 */
class Memory implements \Psr\SimpleCache\CacheInterface
{
    private $cache = [];
    public function clear()
    {
    }
    public function delete($key)
    {
    }
    public function deleteMultiple($keys)
    {
    }
    public function get($key, $default = null)
    {
    }
    public function getMultiple($keys, $default = null)
    {
    }
    public function has($key)
    {
    }
    public function set($key, $value, $ttl = null)
    {
    }
    public function setMultiple($values, $ttl = null)
    {
    }
}