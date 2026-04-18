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
    protected $preparedId;
    /**
     * @param string $sql
     * @param array $params
     * @param null|string $preparedId
     */
    public function __construct(string $sql, array $params = [], ?string $preparedId = null)
    {
    }
    /**
     * @param null $startTime
     * @param null $startMemory
     */
    public function start($startTime = null, $startMemory = null) : void
    {
    }
    /**
     * @param \Exception|null $exception
     * @param int $rowCount
     * @param float $endTime
     * @param int $endMemory
     */
    public function end(\Exception $exception = null, int $rowCount = 0, float $endTime = null, int $endMemory = null) : void
    {
    }
    /**
     * Check parameters for illegal (non UTF-8) strings, like Binary data.
     *
     * @param array $params
     * @return array
     */
    public function checkParameters(array $params) : array
    {
    }
    /**
     * Returns the SQL string used for the query, without filled parameters
     *
     * @return string
     */
    public function getSql() : string
    {
    }
    /**
     * Returns the SQL string with any parameters used embedded
     *
     * @param string $quotationChar
     * @return string
     */
    public function getSqlWithParams(string $quotationChar = '<>') : string
    {
    }
    /**
     * Returns the number of rows affected/returned
     *
     * @return int
     */
    public function getRowCount() : int
    {
    }
    /**
     * Returns an array of parameters used with the query
     *
     * @return array
     */
    public function getParameters() : array
    {
    }
    /**
     * Returns the prepared statement id
     *
     * @return null|string
     */
    public function getPreparedId() : ?string
    {
    }
    /**
     * Checks if this is a prepared statement
     *
     * @return boolean
     */
    public function isPrepared() : bool
    {
    }
    /**
     * @return float
     */
    public function getStartTime() : float
    {
    }
    /**
     * @return float
     */
    public function getEndTime() : float
    {
    }
    /**
     * Returns the duration in seconds + microseconds of the execution
     *
     * @return float
     */
    public function getDuration() : float
    {
    }
    /**
     * @return int
     */
    public function getStartMemory() : int
    {
    }
    /**
     * @return int
     */
    public function getEndMemory() : int
    {
    }
    /**
     * Returns the memory usage during the execution
     *
     * @return int
     */
    public function getMemoryUsage() : int
    {
    }
    /**
     * Checks if the statement was successful
     *
     * @return boolean
     */
    public function isSuccess() : bool
    {
    }
    /**
     * Returns the exception triggered
     *
     * @return \Exception
     */
    public function getException() : \Exception
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
    public function getErrorMessage() : string
    {
    }
}