<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into files
 */
class FileStorage implements \DebugBar\Storage\StorageInterface
{
    protected $dirname;
    /**
     * @param string $dirname Directories where to store files
     */
    public function __construct($dirname)
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
    public function makeFilename($id)
    {
    }
}