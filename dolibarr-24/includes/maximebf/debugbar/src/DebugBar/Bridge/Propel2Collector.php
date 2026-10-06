<?php

namespace DebugBar\Bridge;

/**
 * A Propel logger which acts as a data collector
 *
 * http://propelorm.org/
 *
 * Will log queries and display them using the SQLQueries widget.
 *
 * Example:
 * <code>
 * $debugbar->addCollector(new \DebugBar\Bridge\Propel2Collector(\Propel\Runtime\Propel::getServiceContainer()->getReadConnection()));
 * </code>
 */
class Propel2Collector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    /**
     * @var null|TestHandler
     */
    protected $handler = null;
    /**
     * @var null|Logger
     */
    protected $logger = null;
    /**
     * @var array
     */
    protected $config = array();
    /**
     * @var array
     */
    protected $errors = array();
    /**
     * @var int
     */
    protected $queryCount = 0;
    /**
     * @param ConnectionInterface $connection Propel connection
     */
    public function __construct(\Propel\Runtime\Connection\ConnectionInterface $connection, array $logMethods = array('beginTransaction', 'commit', 'rollBack', 'forceRollBack', 'exec', 'query', 'execute'))
    {
    }
    /**
     * @return TestHandler|null
     */
    public function getHandler()
    {
    }
    /**
     * @return array
     */
    public function getConfig()
    {
    }
    /**
     * @return Logger|null
     */
    public function getLogger()
    {
    }
    /**
     * @return LoggerInterface
     */
    protected function getDefaultLogger()
    {
    }
    /**
     * @return int
     */
    protected function getQueryCount()
    {
    }
    /**
     * @param array $records
     * @param array $config
     * @return array
     */
    protected function getStatements($records, $config)
    {
    }
    /**
     * @return array
     */
    public function collect()
    {
    }
    /**
     * @return string
     */
    public function getName()
    {
    }
    /**
     * @return array
     */
    public function getWidgets()
    {
    }
    /**
     * @return array
     */
    public function getAssets()
    {
    }
}