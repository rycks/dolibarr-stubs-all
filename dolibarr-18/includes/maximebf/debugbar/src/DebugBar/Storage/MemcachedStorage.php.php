<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into Memcache using the Memcached extension
 */
class MemcachedStorage implements \DebugBar\Storage\StorageInterface
{
    protected $memcached;
    protected $keyNamespace;
    protected $expiration;
    protected $newGetMultiSignature;
    /**
     * @param Memcached $memcached
     * @param string $keyNamespace Namespace for Memcached key names (to avoid conflict with other Memcached users).
     * @param int $expiration Expiration for Memcached entries (see Expiration Times in Memcached documentation).
     */
    public function __construct(\Memcached $memcached, $keyNamespace = 'phpdebugbar', $expiration = 0)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function save($id, $data)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function find(array $filters = array(), $max = 20, $offset = 0)
    {
    }
    /**
     * Filter the metadata for matches.
     * 
     * @param  array $meta
     * @param  array $filters
     * @return bool
     */
    protected function filter($meta, $filters)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function clear()
    {
    }
    /**
     * @param  string $id
     * @return string 
     */
    protected function createKey($id)
    {
    }
    /**
     * The memcached getMulti function changed in version 3.0.0 to only have two parameters.
     *
     * @param array $keys
     * @param int $flags
     */
    protected function memcachedGetMulti($keys, $flags)
    {
    }
}