<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into Redis
 */
class RedisStorage implements \DebugBar\Storage\StorageInterface
{
    protected $redis;
    protected $hash;
    /**
     * @param string $dirname Directories where to store files
     */
    public function __construct(\Predis\Client $redis, $hash = 'phpdebugbar')
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
}