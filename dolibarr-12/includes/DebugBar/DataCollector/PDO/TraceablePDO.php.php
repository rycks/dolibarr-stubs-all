<?php

namespace DebugBar\DataCollector\PDO;

/**
 * A PDO proxy which traces statements
 */
class TraceablePDO extends \PDO
{
    protected $pdo;
    protected $executedStatements = array();
    public function __construct(\PDO $pdo)
    {
    }
    public function beginTransaction()
    {
    }
    public function commit()
    {
    }
    public function errorCode()
    {
    }
    public function errorInfo()
    {
    }
    public function exec($sql)
    {
    }
    public function getAttribute($attr)
    {
    }
    public function inTransaction()
    {
    }
    public function lastInsertId($name = null)
    {
    }
    public function prepare($sql, $driver_options = array())
    {
    }
    public function query($sql)
    {
    }
    public function quote($expr, $parameter_type = \PDO::PARAM_STR)
    {
    }
    public function rollBack()
    {
    }
    public function setAttribute($attr, $value)
    {
    }
    /**
     * Profiles a call to a PDO method
     *
     * @param string $method
     * @param string $sql
     * @param array $args
     * @return mixed The result of the call
     */
    protected function profileCall($method, $sql, array $args)
    {
    }
    /**
     * Adds an executed TracedStatement
     *
     * @param TracedStatement $stmt
     */
    public function addExecutedStatement(\DebugBar\DataCollector\PDO\TracedStatement $stmt)
    {
    }
    /**
     * Returns the accumulated execution time of statements
     *
     * @return int
     */
    public function getAccumulatedStatementsDuration()
    {
    }
    /**
     * Returns the peak memory usage while performing statements
     *
     * @return int
     */
    public function getMemoryUsage()
    {
    }
    /**
     * Returns the peak memory usage while performing statements
     *
     * @return int
     */
    public function getPeakMemoryUsage()
    {
    }
    /**
     * Returns the list of executed statements as TracedStatement objects
     *
     * @return array
     */
    public function getExecutedStatements()
    {
    }
    /**
     * Returns the list of failed statements
     *
     * @return array
     */
    public function getFailedExecutedStatements()
    {
    }
    public function __get($name)
    {
    }
    public function __set($name, $value)
    {
    }
    public function __call($name, $args)
    {
    }
}