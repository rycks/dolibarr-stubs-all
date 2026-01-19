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
     */
    public function __construct($sql, array $params = [], $preparedId = null)
    {
    }
    /**
     * @param null $startTime
     * @param null $startMemory
     */
    public function start($startTime = null, $startMemory = null)
    {
    }
    /**
     * @param \Exception|null $exception
     * @param int $rowCount
     * @param float $endTime
     * @param int $endMemory
     */
    public function end(\Exception $exception = null, $rowCount = 0, $endTime = null, $endMemory = null)
    {
    }
    /**
     * Check parameters for illegal (non UTF-8) strings, like Binary data.
     *
     * @param array $params
     * @return array
     */
    public function checkParameters($params)
    {
    }
    /**
     * Returns the SQL string used for the query, without filled parameters
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
    /**
     * @return float
     */
    public function getStartTime()
    {
    }
    /**
     * @return float
     */
    public function getEndTime()
    {
    }
    /**
     * Returns the duration in seconds + microseconds of the execution
     *
     * @return float
     */
    public function getDuration()
    {
    }
    /**
     * @return int
     */
    public function getStartMemory()
    {
    }
    /**
     * @return int
     */
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
     * @return int|string
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