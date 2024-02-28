<?php

namespace DebugBar\Bridge;

/**
 * A Propel logger which acts as a data collector
 *
 * http://propelorm.org/
 *
 * Will log queries and display them using the SQLQueries widget.
 * You can provide a LoggerInterface object to forward non-query related message to.
 *
 * Example:
 * <code>
 * $debugbar->addCollector(new PropelCollector($debugbar['messages']));
 * PropelCollector::enablePropelProfiling();
 * </code>
 */
class PropelCollector extends \DebugBar\DataCollector\DataCollector implements \BasicLogger, \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    protected $logger;
    protected $statements = array();
    protected $accumulatedTime = 0;
    protected $peakMemory = 0;
    /**
     * Sets the needed configuration option in propel to enable query logging
     *
     * @param PropelConfiguration $config Apply profiling on a specific config
     */
    public static function enablePropelProfiling(\PropelConfiguration $config = null)
    {
    }
    /**
     * @param LoggerInterface $logger A logger to forward non-query log lines to
     * @param PropelPDO $conn Bound this collector to a connection only
     */
    public function __construct(\Psr\Log\LoggerInterface $logger = null, \PropelPDO $conn = null)
    {
    }
    public function setLogQueriesToLogger($enable = true)
    {
    }
    public function isLogQueriesToLogger()
    {
    }
    public function emergency($m)
    {
    }
    public function alert($m)
    {
    }
    public function crit($m)
    {
    }
    public function err($m)
    {
    }
    public function warning($m)
    {
    }
    public function notice($m)
    {
    }
    public function info($m)
    {
    }
    public function debug($m)
    {
    }
    public function log($message, $severity = null)
    {
    }
    /**
     * Converts Propel log levels to PSR log levels
     *
     * @param int $level
     * @return string
     */
    protected function convertLogLevel($level)
    {
    }
    /**
     * Parse a log line to extract query information
     *
     * @param string $message
     */
    protected function parseAndLogSqlQuery($message)
    {
    }
    public function collect()
    {
    }
    public function getName()
    {
    }
    public function getWidgets()
    {
    }
    public function getAssets()
    {
    }
}