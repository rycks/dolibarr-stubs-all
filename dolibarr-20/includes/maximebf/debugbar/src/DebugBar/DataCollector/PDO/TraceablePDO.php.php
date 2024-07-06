<?php

namespace DebugBar\DataCollector\PDO;

/**
 * A PDO proxy which traces statements
 */
class TraceablePDO extends \PDO
{
    /** @var PDO */
    protected $pdo;
    /** @var TracedStatement[] */
    protected $executedStatements = [];
    public function __construct(\PDO $pdo)
    {
    }
    /**
     * Initiates a transaction
     *
     * @link   http://php.net/manual/en/pdo.begintransaction.php
     * @return bool TRUE on success or FALSE on failure.
     */
    public function beginTransaction() : bool
    {
    }
    /**
     * Commits a transaction
     *
     * @link   http://php.net/manual/en/pdo.commit.php
     * @return bool TRUE on success or FALSE on failure.
     */
    public function commit() : bool
    {
    }
    /**
     * Fetch extended error information associated with the last operation on the database handle
     *
     * @link   http://php.net/manual/en/pdo.errorinfo.php
     * @return array PDO::errorInfo returns an array of error information
     */
    #[\ReturnTypeWillChange]
    public function errorCode()
    {
    }
    /**
     * Fetch extended error information associated with the last operation on the database handle
     *
     * @link   http://php.net/manual/en/pdo.errorinfo.php
     * @return array PDO::errorInfo returns an array of error information
     */
    public function errorInfo() : array
    {
    }
    /**
     * Execute an SQL statement and return the number of affected rows
     *
     * @link   http://php.net/manual/en/pdo.exec.php
     * @param  string   $statement
     * @return int|bool PDO::exec returns the number of rows that were modified or deleted by the
     * SQL statement you issued. If no rows were affected, PDO::exec returns 0. This function may
     * return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE.
     * Please read the section on Booleans for more information
     */
    #[\ReturnTypeWillChange]
    public function exec($statement)
    {
    }
    /**
     * Retrieve a database connection attribute
     *
     * @link   http://php.net/manual/en/pdo.getattribute.php
     * @param  int   $attribute One of the PDO::ATTR_* constants
     * @return mixed A successful call returns the value of the requested PDO attribute.
     * An unsuccessful call returns null.
     */
    #[\ReturnTypeWillChange]
    public function getAttribute($attribute)
    {
    }
    /**
     * Checks if inside a transaction
     *
     * @link   http://php.net/manual/en/pdo.intransaction.php
     * @return bool TRUE if a transaction is currently active, and FALSE if not.
     */
    public function inTransaction() : bool
    {
    }
    /**
     * Returns the ID of the last inserted row or sequence value
     *
     * @link   http://php.net/manual/en/pdo.lastinsertid.php
     * @param  string $name [optional]
     * @return string If a sequence name was not specified for the name parameter, PDO::lastInsertId
     * returns a string representing the row ID of the last row that was inserted into the database.
     */
    #[\ReturnTypeWillChange]
    public function lastInsertId($name = null)
    {
    }
    /**
     * Prepares a statement for execution and returns a statement object
     *
     * @link   http://php.net/manual/en/pdo.prepare.php
     * @param  string $statement This must be a valid SQL statement template for the target DB server.
     * @param  array  $driver_options [optional] This array holds one or more key=&gt;value pairs to
     * set attribute values for the PDOStatement object that this method returns.
     * @return TraceablePDOStatement|bool If the database server successfully prepares the statement,
     * PDO::prepare returns a PDOStatement object. If the database server cannot successfully prepare
     * the statement, PDO::prepare returns FALSE or emits PDOException (depending on error handling).
     */
    #[\ReturnTypeWillChange]
    public function prepare($statement, $driver_options = [])
    {
    }
    /**
     * Executes an SQL statement, returning a result set as a PDOStatement object
     *
     * @link   http://php.net/manual/en/pdo.query.php
     * @param  string $statement
     * @param  int $fetchMode
     * @param  mixed ...$fetchModeArgs
     * @return TraceablePDOStatement|bool PDO::query returns a PDOStatement object, or FALSE on
     * failure.
     */
    #[\ReturnTypeWillChange]
    public function query($statement, $fetchMode = null, ...$fetchModeArgs)
    {
    }
    /**
     * Quotes a string for use in a query.
     *
     * @link   http://php.net/manual/en/pdo.quote.php
     * @param  string $string The string to be quoted.
     * @param  int    $parameter_type [optional] Provides a data type hint for drivers that have
     * alternate quoting styles.
     * @return string|bool A quoted string that is theoretically safe to pass into an SQL statement.
     * Returns FALSE if the driver does not support quoting in this way.
     */
    #[\ReturnTypeWillChange]
    public function quote($string, $parameter_type = \PDO::PARAM_STR)
    {
    }
    /**
     * Rolls back a transaction
     *
     * @link   http://php.net/manual/en/pdo.rollback.php
     * @return bool TRUE on success or FALSE on failure.
     */
    public function rollBack() : bool
    {
    }
    /**
     * Set an attribute
     *
     * @link   http://php.net/manual/en/pdo.setattribute.php
     * @param  int $attribute
     * @param  mixed $value
     * @return bool TRUE on success or FALSE on failure.
     */
    public function setAttribute($attribute, $value) : bool
    {
    }
    /**
     * Profiles a call to a PDO method
     *
     * @param  string $method
     * @param  string $sql
     * @param  array  $args
     * @return mixed  The result of the call
     */
    #[\ReturnTypeWillChange]
    protected function profileCall($method, $sql, array $args)
    {
    }
    /**
     * Adds an executed TracedStatement
     *
     * @param TracedStatement $stmt
     */
    public function addExecutedStatement(\DebugBar\DataCollector\PDO\TracedStatement $stmt) : void
    {
    }
    /**
     * Returns the accumulated execution time of statements
     *
     * @return float
     */
    public function getAccumulatedStatementsDuration() : float
    {
    }
    /**
     * Returns the peak memory usage while performing statements
     *
     * @return int
     */
    public function getMemoryUsage() : int
    {
    }
    /**
     * Returns the peak memory usage while performing statements
     *
     * @return int
     */
    public function getPeakMemoryUsage() : int
    {
    }
    /**
     * Returns the list of executed statements as TracedStatement objects
     *
     * @return TracedStatement[]
     */
    public function getExecutedStatements() : array
    {
    }
    /**
     * Returns the list of failed statements
     *
     * @return TracedStatement[]
     */
    public function getFailedExecutedStatements() : array
    {
    }
    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
    }
    /**
     * @param $name
     * @param $args
     * @return mixed
     */
    public function __call($name, $args)
    {
    }
}