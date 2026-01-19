<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into Memcache using the Memcached extension
 */
class MemcachedStorage implements \DebugBar\Storage\StorageInterface
{
    protected $memcached;
    protected $keyNamespace;
    /**
     * @param Memcached $memcached
     */
    public function __construct(\Memcached $memcached, $keyNamespace = 'phpdebugbar')
    {
    }
    public function save($id, $data)
    {
    }
    public function get($id)
    {
    }
    public function find(array $filters = array(), $max = 20, $offset = 0)
    {
    }
    /**
     * Filter the metadata for matches.
     */
    protected function filter($meta, $filters)
    {
    }
    public function clear()
    {
    }
    protected function createKey($id)
    {
    }
}