<?php

namespace DebugBar\DataCollector\PDO;

/**
 * Holds information about a statement
 */
class TracedStatement
{
    protected $sql;
    protected $rowCount;
    protected $parameters;
    protected $startTime;
    protected $endTime;
    protected $duration;
    protected $startMemory;
    protected $endMemory;
    protected $memoryDelta;
    protected $exception;
    /**
     * @param string $sql
     * @param array $params
     * @param string $preparedId
     * @param integer $rowCount
     * @param integer $startTime
     * @param integer $endTime
     * @param integer $memoryUsage
     * @param \Exception $e
     */
    public function __construct($sql, array $params = array(), $preparedId = null)
    {
    }
    public function start($startTime = null, $startMemory = null)
    {
    }
    public function end(\Exception $exception = null, $rowCount = 0, $endTime = null, $endMemory = null)
    {
    }
    /**
     * Check parameters for illegal (non UTF-8) strings, like Binary data.
     *
     * @param $params
     * @return mixed
     */
    public function checkParameters($params)
    {
    }
    /**
     * Returns the SQL string used for the query
     *
     * @return string
     */
    public function getSql()
    {
    }
    /**
     * Returns the SQL string with any parameters used embedded
     *
     * @param string $quotationChar
     * @return string
     */
    public function getSqlWithParams($quotationChar = '<>')
    {
    }
    /**
     * Returns the number of rows affected/returned
     *
     * @return int
     */
    public function getRowCount()
    {
    }
    /**
     * Returns an array of parameters used with the query
     *
     * @return array
     */
    public function getParameters()
    {
    }
    /**
     * Returns the prepared statement id
     *
     * @return string
     */
    public function getPreparedId()
    {
    }
    /**
     * Checks if this is a prepared statement
     *
     * @return boolean
     */
    public function isPrepared()
    {
    }
    public function getStartTime()
    {
    }
    public function getEndTime()
    {
    }
    /**
     * Returns the duration in seconds of the execution
     *
     * @return int
     */
    public function getDuration()
    {
    }
    public function getStartMemory()
    {
    }
    public function getEndMemory()
    {
    }
    /**
     * Returns the memory usage during the execution
     *
     * @return int
     */
    public function getMemoryUsage()
    {
    }
    /**
     * Checks if the statement was successful
     *
     * @return boolean
     */
    public function isSuccess()
    {
    }
    /**
     * Returns the exception triggered
     *
     * @return \Exception
     */
    public function getException()
    {
    }
    /**
     * Returns the exception's code
     *
     * @return string
     */
    public function getErrorCode()
    {
    }
    /**
     * Returns the exception's message
     *
     * @return string
     */
    public function getErrorMessage()
    {
    }
}