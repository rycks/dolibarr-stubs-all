<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into a database using PDO
 */
class PdoStorage implements \DebugBar\Storage\StorageInterface
{
    protected $pdo;
    protected $tableName;
    protected $sqlQueries = array('save' => "INSERT INTO %tablename% (id, data, meta_utime, meta_datetime, meta_uri, meta_ip, meta_method) VALUES (?, ?, ?, ?, ?, ?, ?)", 'get' => "SELECT data FROM %tablename% WHERE id = ?", 'find' => "SELECT data FROM %tablename% %where% LIMIT %limit% OFFSET %offset%", 'clear' => "DELETE FROM %tablename%");
    /**
     * @param string $dirname Directories where to store files
     * @param array $sqlQueries
     */
    public function __construct(\PDO $pdo, $tableName = 'phpdebugbar', array $sqlQueries = array())
    {
    }
    /**
     * Sets the sql queries to be used
     *
     * @param array $queries
     */
    public function setSqlQueries(array $queries)
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
    public function clear()
    {
    }
    protected function getSqlQuery($name, array $vars = array())
    {
    }
}