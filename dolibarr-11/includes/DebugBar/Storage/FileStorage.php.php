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
    public function makeFilename($id)
    {
    }
}