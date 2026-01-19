<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into Redis
 */
class RedisStorage implements \DebugBar\Storage\StorageInterface
{
    /** @var \Predis\Client|\Redis */
    protected $redis;
    /** @var string */
    protected $hash;
    /**
     * @param  \Predis\Client|\Redis $redis Redis Client
     * @param string $hash
     */
    public function __construct($redis, $hash = 'phpdebugbar')
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
    public function find(array $filters = [], $max = 20, $offset = 0)
    {
    }
    /**
     * Filter the metadata for matches.
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
}