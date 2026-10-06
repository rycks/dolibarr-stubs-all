<?php

namespace DebugBar\Storage;

/**
 * Stores collected data into a database using PDO
 */
class PdoStorage implements \DebugBar\Storage\StorageInterface
{
    protected $pdo;
    protected $tableName;
    protected $sqlQueries = array('save' => "INSERT INTO %tablename% (id, data, meta_utime, meta_datetime, meta_uri, meta_ip, meta_method) VALUES (?, ?, ?, ?, ?, ?, ?)", 'get' => "SELECT data FROM %tablename% WHERE id = ?", 'find' => "SELECT data FROM %tablename% %where% ORDER BY meta_datetime DESC LIMIT %limit% OFFSET %offset%", 'clear' => "DELETE FROM %tablename%");
    /**
     * @param \PDO $pdo The PDO instance
     * @param string $tableName
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
     * {@inheritdoc}
     */
    public function clear()
    {
    }
    /**
     * Get a SQL Query for a task, with the variables replaced
     *
     * @param  string $name
     * @param  array  $vars
     * @return string
     */
    protected function getSqlQuery($name, array $vars = array())
    {
    }
}